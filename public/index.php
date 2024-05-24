<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Router;
use Symfony\Component\HttpFoundation\Request;

$entityManager = require __DIR__ . '/../config/bootstrap.php';
$request = Request::createFromGlobals();

$router = new Router($entityManager, $request);
$router->route();

