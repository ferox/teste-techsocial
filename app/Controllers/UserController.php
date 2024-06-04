<?php

namespace App\Controllers;

use App\Models\User;
use App\Traits\FormValidationTrait;
use App\Traits\SessionUtilsTrait;
use App\Traits\ViewsUtilsTrait;
use Doctrine\ORM\EntityManager;
use JetBrains\PhpStorm\NoReturn;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController
{
    use FormValidationTrait, SessionUtilsTrait, ViewsUtilsTrait;
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function buildForm(string $controller_method, array $data = NULL): void
    {
        if ($controller_method === 'create') {
            $this->render('user-form');
        }

        if ($controller_method === 'edit') {
            $this->render('user-edit-form', $data);
        }
    }

    public function index(): void
    {
        $users = $this->entityManager->getRepository(User::class)->findAll();

        $user_data = [];

        foreach ($users as $user) {
            $user_data[] = [
                'id' => $user->getId(),
                'first_name' => $user->getFirstName(),
                'last_name' => $user->getLastName(),
                'document' => $user->getDocument(),
                'email' => $user->getEmail(),
                'phone_number' => $user->getPhoneNumber(),
            ];
        }

        $this->render('users', $user_data);

    }

    #[NoReturn]
    public function create(Request $request)
    {
        $data = $request->request->all();

        if (!$this->checkRequiredData($data, 'user')) {
            $this->renderJS(
                'errorCreateAlert',
                'true',
                '/dashboard/users'
            );
        }

        $user = $this->entityManager
            ->getRepository(User::class)
            ->findOneBy(['email' => $data['email']]);

        if($user) {
            $this->renderJS(
                'errorCreateAlert',
                'true',
                '/dashboard/users'
            );
        }

        $date = is_null($this->dateFormated($data['birth_date']))
            ? NULL
            : NEW \DateTime($this->dateFormated($data['birth_date']));

        $user = new User();
        $user->setFirstName($data['first_name']);
        $user->setLastName($data['last_name']);
        $user->setDocument($data['document']);
        $user->setEmail($this->emailFormated($data['email']));
        $user->setPhoneNumber($data['phone_number']);
        $user->setBirthDate($date);
        $user->setCreatedAt(new \DateTime());
        $user->setUpdatedAt(new \DateTime());

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        if (!$this->isUserLoggedIn()) {
            $this->renderJS(
                'createAlert',
                'true',
                '/login'
            );
        }

        $this->renderJS(
            'createAlert',
            'true',
            '/dashboard/users'
        );
    }

    #[NoReturn]
    public function edit($id)
    {
        $user = $this->entityManager->getRepository(User::class)->find($id);

        if (!$user) {
            $response = new Response(json_encode(['error' => 'User not found']), Response::HTTP_NOT_FOUND, ['Content-Type' => 'application/json']);
            $response->send();
        }

        $this->setNewSession('user_id', $user->getId());

        $user_birthdate = $user->getBirthDate()?->format('d/m/Y');

        $user_data = [
            'first_name' => $user->getFirstName(),
            'last_name' => $user->getLastName(),
            'document' => $user->getDocument(),
            'email' => $user->getEmail(),
            'phone_number' => $user->getPhoneNumber(),
            'birth_date' => $user_birthdate,
        ];

        $this->buildForm('edit', $user_data);
    }

    #[NoReturn]
    public function update(Request $request)
    {
        $data = $request->request->all();

        $user_id = $this->getSession('user_id');

        $user = $this->entityManager->getRepository(User::class)->find($user_id);

        if (!$user) {
            $this->renderJS(
                'errorUpdateAlert',
                'true',
                '/dashboard/users'
            );
        }

        $user->setFirstName($data['first_name'] ?? $user->getFirstName());
        $user->setLastName($data['last_name'] ?? $user->getLastName());
        $user->setDocument($data['document'] ?? $user->getDocument());
        $user->setEmail($data['email'] ?? $user->getEmail());
        $user->setPhoneNumber($data['phone_number'] ?? $user->getPhoneNumber());
        $user->setBirthDate(new \DateTime($data['birth_date'] ?? $user->getBirthDate()->format('Y-m-d')));
        $user->setUpdatedAt(new \DateTime());

        $this->entityManager->flush();

        $this->renderJS(
            'updateAlert',
            'true',
            '/dashboard/users'
        );

    }

    #[NoReturn]
    public function destroy($id)
    {
        $user = $this->entityManager->getRepository(User::class)->find($id);
        $user_logged_id = $this->getLoggedUserId();

        if ($user->getEmail() === 'admin@petitiones.com.br'
            || $user->getId() === $user_logged_id
        ) {
            $this->renderJS(
                'errorDeleteAlert',
                'true',
                '/dashboard/users'
            );
        }

        $this->entityManager->remove($user);
        $this->entityManager->flush();

        $this->renderJS(
            'deleteAlert',
            'true',
            '/dashboard/users'
        );
    }
}
