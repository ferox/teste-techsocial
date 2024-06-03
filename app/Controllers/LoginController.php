<?php

namespace App\Controllers;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Models\User;

class LoginController
{
    private EntityManager $entityManager;
    private Session $session;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->session = new Session();
        $this->session->start();
    }

    public function login(Request $request)
    {
        if ($request->getMethod() === 'POST') {
            $data = $request->request->all();

            $user = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $data['email']]);

            if ($user) {
                $this->session->set('user', $user->getId());
                $response = new RedirectResponse('/dashboard');
                $response->send();
            } else {
                $response = new RedirectResponse('/login');
                $response->send();
            }
        }

        // Renderize o formulário de login
        include __DIR__ . '/../../resources/views/login.php';
    }

    public function logout()
    {
        $this->session->invalidate();

        $response = new RedirectResponse('/');
        $response->send();
    }
}
