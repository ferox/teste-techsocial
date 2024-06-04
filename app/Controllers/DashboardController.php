<?php

namespace App\Controllers;

use App\Traits\ViewsUtilsTrait;
use Doctrine\ORM\EntityManager;

class DashboardController
{
    use ViewsUtilsTrait;

    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function index()
    {
        $userRepository = $this->entityManager->getRepository('App\Models\User');
        $totalUsers = $userRepository->count();

        $orderRepository = $this->entityManager->getRepository('App\Models\Order');
        $totalOrders = $orderRepository->count();

        $this->render('dashboard', [
            'totalUsers' => $totalUsers,
            'totalOrders' => $totalOrders
        ]);
    }
}

