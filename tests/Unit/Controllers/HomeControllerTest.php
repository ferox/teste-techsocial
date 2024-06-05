<?php

use App\Controllers\HomeController;

test('home controller renders view with correct data', function () {
    $controller = new HomeController();

    ob_start();
    $controller->index();
    $output = ob_get_clean();

    expect($output)->toContain('<title>Petitiones | Sistema de Pedidos</title>')
        ->and($output)->toContain('<h2 class="font-semibold text-4xl text-blueGray-600">
                    Petitones a sua solução para gestão de pedidos em demanda.
                </h2>')->and($output)->toContain('<h4 class="text-3xl font-semibold">Entre em contato!</h4>');

});

test('home controller renders view with login and register buttons when user is not logged in', function () {
    unset($_SESSION['user_logged_in']);

    $controller = new HomeController();

    ob_start();
    $controller->index();
    $output = ob_get_clean();

    expect($output)->toContain('Login');
    expect($output)->toContain('Cadastro');
});
