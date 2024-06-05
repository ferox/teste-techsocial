<?php

use App\Controllers\LoginController;
use App\Models\User;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

it('logs in a user and sets the session', function () {
    $entityManagerMock = Mockery::mock(EntityManager::class);
    $repositoryMock = Mockery::mock(EntityRepository::class);
    $userMock = Mockery::mock(User::class);

    $entityManagerMock->shouldReceive('getRepository')->with(User::class)->andReturn($repositoryMock);
    $repositoryMock->shouldReceive('findOneBy')->with(['email' => 'user@example.com'])->andReturn($userMock);
    $userMock->shouldReceive('getId')->andReturn(1);

    $sessionMock = Mockery::mock(Session::class);
    $sessionMock->shouldReceive('start')->once();
    $sessionMock->shouldReceive('has')->with('user_logged_in')->andReturn(true);
    $sessionMock->shouldReceive('set')->with('user_logged_in', 1); // Add this line

    $this->loginController = new LoginController($entityManagerMock, $sessionMock);
    $request = Request::create('/login', 'POST', ['first_name' => 'User', 'email' => 'user@example.com']);

    ob_start();
    $this->loginController->login($request);
    ob_end_clean();

    $this->assertTrue($sessionMock->has('user_logged_in'));

});

it('logs out a user and removes the session', function () {
    $entityManagerMock = Mockery::mock(EntityManager::class);

    $sessionMock = Mockery::mock(Session::class);
    $sessionMock->shouldReceive('start')->once();
    $sessionMock->shouldReceive('invalidate')->once();

    $loginController = new LoginController($entityManagerMock, $sessionMock);

    $redirectResponseMock = Mockery::mock(RedirectResponse::class);
    $redirectResponseMock->shouldReceive('send')->once();

    ob_start();
    $loginController->logout();
    ob_end_clean();

    $redirectResponseMock->send();
});