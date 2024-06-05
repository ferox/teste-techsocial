<?php

use App\Controllers\UserController;
use Doctrine\ORM\EntityManager;

it('renders the correct form based on the controller method', function () {
    // Criar um mock para UserController que usa a trait ViewsUtilsTrait
    $userController = Mockery::mock(UserController::class)->makePartial();

    // Expectativa para a chamada de buildForm('create')
    $userController->shouldReceive('render')
        ->once()
        ->with('user-form')
        ->andReturnNull(); // Mockando o retorno para evitar erro

    // Chamar o método buildForm() com 'create'
    $userController->buildForm('create');

    // Expectativa para a chamada de buildForm('edit')
    $userController->shouldReceive('render')
        ->once()
        ->with('user-edit-form', [
            'first_name' => 'First',
            'last_name' => 'Last',
            'document' => '00000000',
            'email' => 'first@example.com',
            'phone_number' => '000000000',
            'birth_date' => '197-05-05',
        ])
        ->andReturnNull(); // Mockando o retorno para evitar erro

    // Chamar o método buildForm() com 'edit'
    $userController->buildForm('edit', [
        'first_name' => 'First',
        'last_name' => 'Last',
        'document' => '00000000',
        'email' => 'first@example.com',
        'phone_number' => '000000000',
        'birth_date' => '197-05-05',
    ]);
});


