<?php

use App\Middleware\RedirectIfAuthenticated;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

beforeEach(function () {
    /** @var MockObject|RedirectIfAuthenticated */
    $this->middleware = $this->getMockBuilder(RedirectIfAuthenticated::class)
        ->onlyMethods(['isUserLoggedIn'])
        ->getMock();
});

it('redirects to login if user is not logged in and tries to access /dashboard', function () {
    $request = new Request([], [], [], [], [], ['REQUEST_URI' => '/dashboard']);

    $this->middleware->expects($this->once())
        ->method('isUserLoggedIn')
        ->willReturn(false);

    $response = $this->middleware->dashboardHandle($request);

    expect($response)->toBeInstanceOf(RedirectResponse::class);
    expect($response->getTargetUrl())->toBe('/login');
});

it('does not redirect if user tries to access a non-dashboard route', function () {
    $request = new Request([], [], [], [], [], ['REQUEST_URI' => '/login']);

    $this->middleware->expects($this->never())
        ->method('isUserLoggedIn');

    $response = $this->middleware->dashboardHandle($request);

    expect($response)->toBeNull();
});