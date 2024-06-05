<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

$entityManager = require __DIR__ . '/../config/bootstrap.php';
$request = Request::createFromGlobals();
$session = new Session();

$router = new Router($entityManager, $request, $session);
$router->route();

