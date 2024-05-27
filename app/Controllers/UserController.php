<?php

namespace App\Controllers;

use App\Models\User;
use DateTime;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function index(): void
    {
        $users = $this->entityManager->getRepository(User::class)->findAll();

        $userArray = [];

        foreach ($users as $user) {
            $userArray[] = [
                'id' => $user->getId(),
                'first_name' => $user->getFirstName(),
                'last_name' => $user->getLastName(),
                'document' => $user->getDocument(),
                'email' => $user->getEmail(),
                'phone_number' => $user->getPhoneNumber(),
                'birth_date' => $user->getBirthDate()->format('Y-m-d'),
                'created_at' => $user->getCreatedAt()->format('Y-m-d H:i:s'),
                'updated_at' => $user->getUpdatedAt()->format('Y-m-d H:i:s')
            ];
        }

        $response = new Response(json_encode($userArray), Response::HTTP_OK, ['Content-Type' => 'application/json']);

        $response->send();
    }

    public function create(Request $request): void
    {
        $data = $request->request->all();

        $date = DateTime::createFromFormat('d/m/Y', $data['birth_date']);
        $date_formated = $date->format('Y-m-d');

        $user = new User();
        $user->setFirstName($data['first_name']);
        $user->setLastName($data['last_name']);
        $user->setDocument($data['document']);
        $user->setEmail($data['email']);
        $user->setPhoneNumber($data['phone_number']);
        $user->setBirthDate(new \DateTime($date_formated));
        $user->setCreatedAt(new \DateTime());
        $user->setUpdatedAt(new \DateTime());

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        // Define the userRegistered item in localStorage and redirect
        echo '<script>
                localStorage.setItem("userRegistered", "true");
                window.location.href = "/login";
             </script>';
        exit;

//        $response = new RedirectResponse('/login');
//        $response->send();
    }

    public function edit($id)
    {
        $user = $this->entityManager->getRepository(User::class)->find($id);

        if ($user) {
            $userArray = [
                'id' => $user->getId(),
                'first_name' => $user->getFirstName(),
                'last_name' => $user->getLastName(),
                'document' => $user->getDocument(),
                'email' => $user->getEmail(),
                'phone_number' => $user->getPhoneNumber(),
                'birth_date' => $user->getBirthDate()->format('Y-m-d'),
                'created_at' => $user->getCreatedAt()->format('Y-m-d H:i:s'),
                'updated_at' => $user->getUpdatedAt()->format('Y-m-d H:i:s')
            ];

            $response = new Response(json_encode($userArray), Response::HTTP_OK, ['Content-Type' => 'application/json']);
        } else {
            $response = new Response(json_encode(['error' => 'User not found']), Response::HTTP_NOT_FOUND, ['Content-Type' => 'application/json']);
        }
        $response->send();
    }

    public function update($id)
    {
        $request = Request::createFromGlobals();
        $data = json_decode($request->getContent(), true);

        $user = $this->entityManager->getRepository(User::class)->find($id);
        if ($user) {
            $user->setFirstName($data['first_name'] ?? $user->getFirstName());
            $user->setLastName($data['last_name'] ?? $user->getLastName());
            $user->setDocument($data['document'] ?? $user->getDocument());
            $user->setEmail($data['email'] ?? $user->getEmail());
            $user->setPhoneNumber($data['phone_number'] ?? $user->getPhoneNumber());
            $user->setBirthDate(new \DateTime($data['birth_date'] ?? $user->getBirthDate()->format('Y-m-d')));
            $user->setUpdatedAt(new \DateTime());

            $this->entityManager->flush();

            $response = new Response(json_encode(['status' => 'User updated']), Response::HTTP_OK, ['Content-Type' => 'application/json']);
        } else {
            $response = new Response(json_encode(['error' => 'User not found']), Response::HTTP_NOT_FOUND, ['Content-Type' => 'application/json']);
        }
        $response->send();
    }

    public function destroy($id)
    {
        $user = $this->entityManager->getRepository(User::class)->find($id);
        if ($user) {
            $this->entityManager->remove($user);
            $this->entityManager->flush();

            $response = new Response(json_encode(['status' => 'User deleted']), Response::HTTP_OK, ['Content-Type' => 'application/json']);
        } else {
            $response = new Response(json_encode(['error' => 'User not found']), Response::HTTP_NOT_FOUND, ['Content-Type' => 'application/json']);
        }
        $response->send();
    }
}
