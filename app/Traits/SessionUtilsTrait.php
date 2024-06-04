<?php

namespace App\Traits;

use Symfony\Component\HttpFoundation\Session\Session;

trait SessionUtilsTrait
{
    public function isUserLoggedIn(): bool
    {
        $session =  new Session();
        $userLoggedIn = $session->get('user_logged_in');

        return isset($userLoggedIn);
    }

    public function getLoggedUserId()
    {
        $session =  new Session();
        return $session->get('user_logged_in');
    }

    public function setNewSession(string $name, string $value): void
    {
        $session = new Session();
        $session->set($name, $value);
    }

    public function getSession(string $name)
    {
        $session =  new Session();
        return $session->get($name);
    }

}