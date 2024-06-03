<?php

namespace App\Controllers;

use Symfony\Component\HttpFoundation\Session\Session;

class HomeController
{
    public function index()
    {
        $session =  new Session();

        $user_logged_in = $session->get('user');

        include __DIR__ . '/../../resources/views/home.php';
    }
}
