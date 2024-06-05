<?php

use App\Controllers\DashboardController;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

beforeEach(function () {
    $this->entityManager = Mockery::mock(EntityManager::class);
    $this->userRepository = Mockery::mock(EntityRepository::class);
    $this->orderRepository = Mockery::mock(EntityRepository::class);

    $this->entityManager->shouldReceive('getRepository')
        ->with('App\Models\User')
        ->andReturn($this->userRepository);

    $this->entityManager->shouldReceive('getRepository')
        ->with('App\Models\Order')
        ->andReturn($this->orderRepository);

    $this->controller = new DashboardController($this->entityManager);
});

it('renders the dashboard with total users and orders', function ($totalUsers, $totalOrders) {
    $this->userRepository->shouldReceive('count')->andReturn($totalUsers);
    $this->orderRepository->shouldReceive('count')->andReturn($totalOrders);

    // Captura a saída da função render para inspeção
    ob_start();
    $this->controller->index();
    $output = ob_get_clean();

    // Verifique se os valores retornados são os esperados usando regex
    expect($output)->toMatch('/Usuário Cadastrados.*?<span[^>]*>\s*' . $totalUsers . '\s*<\/span>/s');
    expect($output)->toMatch('/Pedidos Cadastrados.*?<span[^>]*>\s*' . $totalOrders . '\s*<\/span>/s');
})->with([
    [10, 20], // Cenário de teste com 10 usuários e 20 pedidos
    [0, 0],   // Cenário de teste com 0 usuários e 0 pedidos
    [5, 15],  // Cenário de teste com 5 usuários e 15 pedidos
]);

afterEach(function () {
    Mockery::close();
});
