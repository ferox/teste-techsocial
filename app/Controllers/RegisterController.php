<?php

namespace App\Controllers;

use App\Traits\SessionUtilsTrait;
use App\Traits\ViewsUtilsTrait;

class RegisterController
{
    use SessionUtilsTrait, ViewsUtilsTrait;

    public function register()
    {
        $isUserLoggedIn = $this->isUserLoggedIn();

        $this->render('register', [
            'isUserLoggedIn' => $isUserLoggedIn
        ]);
    }

}