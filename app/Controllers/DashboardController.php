<?php

namespace App\Controllers;

class DashboardController
{
    public function index()
    {
        include __DIR__ . '/../../resources/views/dashboard.php';
    }
}
