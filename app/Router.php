<?php

namespace App;

use App\Controllers\DashboardController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;
use App\Middleware\RedirectIfAuthenticated;
use Doctrine\ORM\EntityManager;
use App\Controllers\UserController;
use App\Controllers\OrderController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class Router
{
    private EntityManager $entityManager;
    private Request $request;

    private Session $session;

    public function __construct(EntityManager $entityManager, Request $request, Session $session)
    {
        $this->entityManager = $entityManager;
        $this->request = $request;
        $this->session = $session;
    }

    public function route()
    {
        $uri = $this->request->getPathInfo();
        $method = $this->request->getMethod();

        $redirectAuthMiddleware = new RedirectIfAuthenticated();
        $authResponse = $redirectAuthMiddleware->dashboardHandle($this->request);

        if ($authResponse) {
            $authResponse->send();
            return;
        }

        if ($method === 'POST' && $this->request->request->has('_method')) {
            $method = strtoupper($this->request->request->get('_method'));
        }

        $routes = [
            '/' => ['GET' =>  fn() => (new HomeController())->index()],
            '/login' => [
                'GET' =>  fn() => (new LoginController($this->entityManager, $this->session))->login($this->request),
                'POST' =>  fn() => (new LoginController($this->entityManager, $this->session))->login($this->request)
            ],
            '/logout' => [
                'GET' =>  fn() => (new LoginController($this->entityManager, $this->session))->logout(),
            ],
            '/register' => ['GET' =>  fn() => (new RegisterController())->register()],
            '/dashboard' => ['GET' =>  fn() => (new DashboardController($this->entityManager))->index()],
            '/users/create' => [
                'POST' => fn() => (new UserController($this->entityManager))->create($this->request)
            ],
            '/dashboard/users' => [
                'GET' => fn() => (new UserController($this->entityManager))->index(),
            ],
            '/dashboard/users/form' => [
                'GET' => fn() => (new UserController($this->entityManager))->buildForm('create'),
            ],
            '/dashboard/users/update' => [
                'PUT' => fn() => (new UserController($this->entityManager))->update($this->request),
            ],
            '/dashboard/orders' => [
                'GET' => fn() => (new OrderController($this->entityManager))->index(),
                'POST' => fn() => (new OrderController($this->entityManager))->create($this->request)
            ],
            '/dashboard/orders/form' => [
                'GET' => fn() => (new OrderController($this->entityManager))->buildForm('create'),
            ],
            '/dashboard/orders/update' => [
                'PUT' => fn() => (new OrderController($this->entityManager))->update($this->request),
            ],

        ];

        if (isset($routes[$uri][$method])) {
            $routes[$uri][$method]();
            return;
        }

        $dynamicRoutes = [
            '#^/dashboard/users/edit/(\d+)$#' => fn($matches) => (new UserController($this->entityManager))->edit($matches[1]),
            '#^/dashboard/users/delete/(\d+)$#' => fn($matches) => (new UserController($this->entityManager))->destroy($matches[1]),
            '#^/dashboard/orders/edit/(\d+)$#' => fn($matches) => (new OrderController($this->entityManager))->edit($matches[1]),
            '#^/dashboard/orders/delete/(\d+)$#' => fn($matches) => (new OrderController($this->entityManager))->destroy($matches[1]),
        ];

        foreach ($dynamicRoutes as $pattern => $action) {
            if (preg_match($pattern, $uri, $matches)) {
                $action($matches);
                return;
            }
        }

        $response = new RedirectResponse('/');
        $response->send();
    }
}
