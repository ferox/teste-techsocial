<?php

use App\Controllers\OrderController;
use App\Models\Order;
use App\Models\User;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\Request;

beforeEach(function () {
    $this->entityManager = $this->getMockBuilder(EntityManager::class)
        ->disableOriginalConstructor()
        ->getMock();

    $this->userRepository = $this->getMockBuilder(EntityRepository::class)
        ->disableOriginalConstructor()
        ->getMock();

    $this->orderRepository = $this->getMockBuilder(EntityRepository::class)
        ->disableOriginalConstructor()
        ->getMock();

    $this->entityManager->method('getRepository')
        ->will($this->returnValueMap([
            [User::class, $this->userRepository],
            [Order::class, $this->orderRepository],
        ]));

    $this->orderController = $this->getMockBuilder(OrderController::class)
        ->setConstructorArgs([$this->entityManager])
        ->onlyMethods(['getLoggedUserId', 'renderJS', 'priceFormatedToDatabase'])
        ->getMock();
});

it('creates a new order and redirects to dashboard', function () {
    $requestData = [
        'description' => 'New Order',
        'quantity' => 10,
        'price' => '100.00',
    ];

    $request = new Request([], $requestData);

    $userLoggedId = 1;
    $user = $this->createMock(User::class);

    $this->orderController->method('getLoggedUserId')->willReturn($userLoggedId);
    $this->userRepository->method('find')->with($userLoggedId)->willReturn($user);
    $this->orderController->method('priceFormatedToDatabase')->with('100.00')->willReturn(100.00);

    $this->entityManager->expects($this->once())->method('persist')->with($this->isInstanceOf(Order::class));
    $this->entityManager->expects($this->once())->method('flush');

    $this->orderController->expects($this->once())
        ->method('renderJS')
        ->with('createAlert', 'true', '/dashboard/orders');

    $this->orderController->create($request);
});

it('shows error if user is not found', function () {
    $requestData = [
        'description' => 'New Order',
        'quantity' => 10,
        'price' => '100.00',
    ];

    $request = new Request([], $requestData);

    $userLoggedId = 1;

    $this->orderController->method('getLoggedUserId')->willReturn($userLoggedId);
    $this->userRepository->method('find')->with($userLoggedId)->willReturn(null);

    // Capture the renderJS call and verify its arguments
    $this->orderController->expects($this->once())
        ->method('renderJS')
        ->with('errorCreateAlert', 'true', '/dashboard/orders');

    // Ensure persist and flush are not called when user is not found
    $this->entityManager->expects($this->never())->method('persist');
    $this->entityManager->expects($this->never())->method('flush');

    // Call the create method
    $this->orderController->create($request);
});

