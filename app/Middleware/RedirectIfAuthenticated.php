<?php

namespace App\Middleware;

use App\Traits\SessionUtilsTrait;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class RedirectIfAuthenticated
{
    use SessionUtilsTrait;

    public function dashboardHandle(Request $request): ?RedirectResponse
    {
        $uri = $request->getPathInfo();

        if (str_starts_with($uri, '/dashboard') && !$this->isUserLoggedIn()) {
            return new RedirectResponse('/login');
        }

        return null;
    }
}