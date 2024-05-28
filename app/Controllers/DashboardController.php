<?php

namespace App\Controllers;

use Doctrine\ORM\EntityManager;

class DashboardController
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function index()
    {
        // Obter o total de usuários
        $userRepository = $this->entityManager->getRepository('App\Models\User');
        $totalUsers = $userRepository->count();

        // Obter o total de pedidos
        $orderRepository = $this->entityManager->getRepository('App\Models\Order');
        $totalOrders = $orderRepository->count();

        // Carregando a view e passando os totais
        include __DIR__ . '/../../resources/views/dashboard.php';
    }
}

