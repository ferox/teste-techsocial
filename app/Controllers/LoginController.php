<?php

namespace App\Controllers;

use App\Traits\SessionUtilsTrait;
use App\Traits\ViewsUtilsTrait;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Models\User;

class LoginController
{
    use SessionUtilsTrait, ViewsUtilsTrait;

    private EntityManager $entityManager;
    private Session $session;

    public function __construct(EntityManager $entityManager, Session $session)
    {
        $this->entityManager = $entityManager;
        $this->session = $session;
        $this->session->start();
    }

    public function login(Request $request)
    {

        if ($request->getMethod() === 'POST') {
            $data = $request->request->all();

            $user = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $data['email']]);

            if ($user) {
                $this->session->set('user_logged_in', $user->getId());
                $response = new RedirectResponse('/dashboard');
                $response->send();
            } else {
                $this->renderJS(
                    'notFoundUserAlert',
                    'true',
                    '/login'
                );

                return;
            }
        }

        $isUserLoggedIn = $this->isUserLoggedIn();

        $this->render('login', [
            'isUserLoggedIn' => $isUserLoggedIn,
        ]);
    }

    public function logout()
    {
        $this->session->invalidate();

        $response = new RedirectResponse('/');
        $response->send();
    }
}
