<?php

namespace App\Controllers;

use App\Traits\SessionUtilsTrait;
use App\Traits\ViewsUtilsTrait;

class HomeController
{
    use SessionUtilsTrait, ViewsUtilsTrait;

    public function index()
    {
        $isUserLoggedIn = $this->isUserLoggedIn();

        $this->render('home', [
            'isUserLoggedIn' => $isUserLoggedIn
        ]);
    }
}
