<?php

namespace App\Controllers;

use App\Models\Order;
use App\Models\User;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderController
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function buildForm()
    {
        include __DIR__ . '/../../resources/views/order-form.php';
    }

    public function index()
    {
        $orders = $this->entityManager->getRepository(Order::class)->findAll();

        $ordersList = [];

        foreach ($orders as $order) {
            $user = $this->entityManager->getRepository(User::class)->find($order->getUserId());
            $ordersList[] = [
                'id' => $order->getId(),
                'user_name' => $user->getFirstName() . ' ' . $user->getLastName(),
                'description' => $order->getDescription(),
                'quantity' => $order->getQuantity(),
                'price' => $order->getPrice(),
            ];
        }

        include __DIR__ . '/../../resources/views/orders.php';
    }

    public function create(Request $request)
    {
        $data = $request->request->all();

//        $user = $this->entityManager->getRepository(User::class)->find($data['user_id']);
//        if (!$user) {
//            $response = new Response(json_encode(['error' => 'User not found']), Response::HTTP_NOT_FOUND, ['Content-Type' => 'application/json']);
//            $response->send();
//            return;
//        }

        $order = new Order();
        $order->setUserId(4);
        $order->setDescription('Teste primeiro pedido');
        $order->setQuantity(5);
        $order->setPrice(234.99);
        $order->setCreatedAt(new \DateTime());
        $order->setUpdatedAt(new \DateTime());

        $this->entityManager->persist($order);
        $this->entityManager->flush();

        $response = new RedirectResponse('/dashboard/orders');
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
