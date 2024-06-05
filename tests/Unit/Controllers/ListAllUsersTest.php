<?php

use App\Controllers\UserController;
use App\Models\User;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

beforeEach(function () {
    $this->entityManager = $this->getMockBuilder(EntityManager::class)
        ->disableOriginalConstructor()
        ->getMock();

    $this->userRepository = $this->getMockBuilder(EntityRepository::class)
        ->disableOriginalConstructor()
        ->getMock();

    $this->entityManager->method('getRepository')
        ->willReturn($this->userRepository);

    $this->userController = $this->getMockBuilder(UserController::class)
        ->setConstructorArgs([$this->entityManager])
        ->onlyMethods(['render'])
        ->getMock();
});

it('renders the users view with correct data', function () {
    $user = $this->createMock(User::class);

    $user->method('getId')->willReturn(1);
    $user->method('getFirstName')->willReturn('John');
    $user->method('getLastName')->willReturn('Doe');
    $user->method('getDocument')->willReturn('123456789');
    $user->method('getEmail')->willReturn('john.doe@example.com');
    $user->method('getPhoneNumber')->willReturn('1234567890');

    $this->userRepository->method('findAll')->willReturn([$user]);

    $expectedData = [
        [
            'id' => 1,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'document' => '123456789',
            'email' => 'john.doe@example.com',
            'phone_number' => '1234567890',
        ],
    ];

    $this->userController->expects($this->once())
        ->method('render')
        ->with('users', $expectedData);

    $this->userController->index();
});