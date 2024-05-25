<?php

namespace App;

use App\Controllers\DashboardController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;
use Doctrine\ORM\EntityManager;
use App\Controllers\UserController;
use App\Controllers\OrderController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class Router
{
    private EntityManager $entityManager;
    private Request $request;

    public function __construct(EntityManager $entityManager, Request $request)
    {
        $this->entityManager = $entityManager;
        $this->request = $request;
    }

    public function route()
    {
        $uri = $this->request->getPathInfo();
        $method = $this->request->getMethod();

        $routes = [
            '/' => ['GET' =>  fn() => (new HomeController())->index()],
            '/login' => ['GET' =>  fn() => (new LoginController())->login()],
            '/register' => ['GET' =>  fn() => (new RegisterController())->register()],
            '/dashboard' => ['GET' =>  fn() => (new DashboardController())->index()],
            '/dashboard/users' => [
                'GET' => fn() => (new UserController($this->entityManager))->index(),
                'POST' => fn() => (new UserController($this->entityManager))->create()
            ],
            '/dashboard/orders' => [
                'GET' => fn() => (new OrderController($this->entityManager))->index(),
                'POST' => fn() => (new OrderController($this->entityManager))->create()
            ],
        ];

        // Verifique as rotas estáticas primeiro
        if (isset($routes[$uri][$method])) {
            $routes[$uri][$method]();
            return;
        }

        // Verifique as rotas dinâmicas usando expressões regulares
        $dynamicRoutes = [
            '#^/dashboard/users/edit/(\d+)$#' => fn($matches) => (new UserController($this->entityManager))->edit($matches[1]),
            '#^/dashboard/users/update/(\d+)$#' => fn($matches) => (new UserController($this->entityManager))->update($matches[1]),
            '#^/dashboard/users/delete/(\d+)$#' => fn($matches) => (new UserController($this->entityManager))->destroy($matches[1]),
            '#^/dashboard/orders/edit/(\d+)$#' => fn($matches) => (new OrderController($this->entityManager))->edit($matches[1]),
            '#^/dashboard/orders/update/(\d+)$#' => fn($matches) => (new OrderController($this->entityManager))->update($matches[1]),
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
