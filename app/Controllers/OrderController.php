<?php

namespace App\Controllers;

use App\Models\Order;
use App\Models\User;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderController
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function index()
    {
        $orders = $this->entityManager->getRepository(Order::class)->findAll();

        $ordersListFormated = [];

        foreach ($orders as $order) {
            $ordersListFormated[] = [
                'id' => $order->getId(),
                'user_id' => $order->getUserId(),
                'description' => $order->getDescription(),
                'document' => $order->getDocument(),
                'quantity' => $order->getQuantity(),
                'price' => $order->getPrice(),
                'created_at' => $order->getCreatedAt()->format('Y-m-d H:i:s'),
                'updated_at' => $order->getUpdatedAt()->format('Y-m-d H:i:s')
            ];
        }

        $response = new Response(json_encode($ordersListFormated), Response::HTTP_OK, ['Content-Type' => 'application/json']);
        $response->send();
    }

    public function create()
    {
        $request = Request::createFromGlobals();
        $data = json_decode($request->getContent(), true);

        $user = $this->entityManager->getRepository(User::class)->find($data['user_id']);
        if (!$user) {
            $response = new Response(json_encode(['error' => 'User not found']), Response::HTTP_NOT_FOUND, ['Content-Type' => 'application/json']);
            $response->send();
            return;
        }

        $order = new Order();
        $order->setUserId($user->getId());
        $order->setDescription($data['description']);
        $order->setQuantity($data['quantity']);
        $order->setPrice($data['price']);
        $order->setCreatedAt(new \DateTime());
        $order->setUpdatedAt(new \DateTime());

        $this->entityManager->persist($order);
        $this->entityManager->flush();

        $response = new Response(json_encode(['id' => $order->getId()]), Response::HTTP_CREATED, ['Content-Type' => 'application/json']);
        $response->send();
    }

    public function edit($id)
    {
        $order = $this->entityManager->getRepository(Order::class)->find($id);
        if ($order) {
            $response = new Response(json_encode($order), Response::HTTP_OK, ['Content-Type' => 'application/json']);
        } else {
            $response = new Response(json_encode(['error' => 'Order not found']), Response::HTTP_NOT_FOUND, ['Content-Type' => 'application/json']);
        }
        $response->send();
    }

    public function update($id)
    {
        $request = Request::createFromGlobals();
        $data = json_decode($request->getContent(), true);

        $order = $this->entityManager->getRepository(Order::class)->find($id);
        if ($order) {
            $order->setDescription($data['description'] ?? $order->getDescription());
            $order->setQuantity($data['quantity'] ?? $order->getQuantity());
            $order->setPrice($data['price'] ?? $order->getPrice());
            $order->setUpdatedAt(new \DateTime());

            $this->entityManager->flush();

            $response = new Response(json_encode(['status' => 'Order updated']), Response::HTTP_OK, ['Content-Type' => 'application/json']);
        } else {
            $response = new Response(json_encode(['error' => 'Order not found']), Response::HTTP_NOT_FOUND, ['Content-Type' => 'application/json']);
        }
        $response->send();
    }

    public function destroy($id)
    {
        $order = $this->entityManager->getRepository(Order::class)->find($id);
        if ($order) {
            $this->entityManager->remove($order);
            $this->entityManager->flush();

            $response = new Response(json_encode(['status' => 'Order deleted']), Response::HTTP_OK, ['Content-Type' => 'application/json']);
        } else {
            $response = new Response(json_encode(['error' => 'Order not found']), Response::HTTP_NOT_FOUND, ['Content-Type' => 'application/json']);
        }
        $response->send();
    }
}
