<?php

use App\Controllers\RegisterController;

beforeEach(function () {
    /** @var MockObject|RegisterController */
    $this->registerController = $this->getMockBuilder(RegisterController::class)
        ->onlyMethods(['isUserLoggedIn', 'render'])
        ->getMock();
});

it('calls render with correct parameters when user is logged in', function () {
    $this->registerController->expects($this->once())
        ->method('isUserLoggedIn')
        ->willReturn(true);

    $this->registerController->expects($this->once())
        ->method('render')
        ->with('register', ['isUserLoggedIn' => true]);

    $this->registerController->register();
});

it('calls render with correct parameters when user is not logged in', function () {
    $this->registerController->expects($this->once())
        ->method('isUserLoggedIn')
        ->willReturn(false);

    $this->registerController->expects($this->once())
        ->method('render')
        ->with('register', ['isUserLoggedIn' => false]);

    $this->registerController->register();
});

