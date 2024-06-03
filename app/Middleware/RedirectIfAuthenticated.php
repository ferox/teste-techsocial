<?php

namespace App\Middleware;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class RedirectIfAuthenticated
{
    private Session $session;

    public function __construct()
    {
        $this->session = new Session();
    }

    public function dashboardHandle(Request $request): ?RedirectResponse
    {
        $uri = $request->getPathInfo();

        if (str_starts_with($uri, '/dashboard') && !$this->session->get('user')) {
            return new RedirectResponse('/login');
        }

        return null;
    }
}