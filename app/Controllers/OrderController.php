<?php

namespace App\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Traits\FormValidationTrait;
use App\Traits\SessionUtilsTrait;
use App\Traits\ViewsUtilsTrait;
use Doctrine\ORM\EntityManager;
use JetBrains\PhpStorm\NoReturn;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderController
{
    use FormValidationTrait, SessionUtilsTrait, ViewsUtilsTrait;
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[NoReturn]
    public function buildForm(string $controller_method, array $data = NULL)
    {
        if ($controller_method === 'create') {
            $this->render('order-form');
        }

        if ($controller_method === 'edit') {
            $this->render('order-edit-form', $data);
        }
    }

    #[NoReturn]
    public function index()
    {
        $orders = $this->entityManager->getRepository(Order::class)->findAll();

        $orders_data = [];

        foreach ($orders as $order) {
            $user = $this->entityManager->getRepository(User::class)->find($order->getUserId());
            $orders_data[] = [
                'id' => $order->getId(),
                'user_name' => $user->getFirstName() . ' ' . $user->getLastName(),
                'description' => $order->getDescription(),
                'quantity' => $order->getQuantity(),
                'price' => $this->priceFormatedToBr($order->getPrice()),
            ];
        }

        $this->render('orders', $orders_data);
    }

    public function create(Request $request)
    {
        $data = $request->request->all();

        $user_logged_id = $this->getLoggedUserId();

        $user = $this->entityManager->getRepository(User::class)->find($user_logged_id);

        if (!$user) {
            $this->renderJS(
                'errorCreateAlert',
                'true',
                '/dashboard/orders'
            );

            return;
        }

        $order = new Order();
        $order->setUserId($user_logged_id);
        $order->setDescription($data['description']);
        $order->setQuantity($data['quantity']);
        $order->setPrice($this->priceFormatedToDatabase($data['price']));
        $order->setCreatedAt(new \DateTime());
        $order->setUpdatedAt(new \DateTime());

        $this->entityManager->persist($order);
        $this->entityManager->flush();

        $this->renderJS(
            'createAlert',
            'true',
            '/dashboard/orders'
        );
    }

    public function edit($id)
    {
        $order = $this->entityManager->getRepository(Order::class)->find($id);

        if (!$order) {
            $response = new Response(json_encode(['error' => 'Order not found']), Response::HTTP_NOT_FOUND, ['Content-Type' => 'application/json']);
            $response->send();
        }

        $this->setNewSession('order_id', $order->getId());

        $order_data = [
            'description' => $order->getDescription(),
            'quantity' => $order->getQuantity(),
            'price' => $this->priceFormatedToBr($order->getPrice())
        ];

        $this->buildForm('edit', $order_data);
    }

    public function update(Request $request)
    {
        $data = $request->request->all();
        $order_id = $this->getSession('order_id');

        $order = $this->entityManager->getRepository(Order::class)->find($order_id);

        if (!$order) {
            $this->renderJS(
                'errorUpdateAlert',
                'true',
                '/dashboard/orders'
            );

            return;
        }

        $order->setUserId($order->getUserId());
        $order->setDescription($data['description'] ?? $order->getDescription());
        $order->setQuantity($data['quantity'] ?? $order->getQuantity());
        $order->setPrice($data['price'] ?? $order->getPrice());
        $order->setUpdatedAt(new \DateTime());

        $this->entityManager->flush();

        $this->renderJS(
            'updateAlert',
            'true',
            '/dashboard/orders'
        );
    }

    public function destroy($id)
    {
        $order = $this->entityManager->getRepository(Order::class)->find($id);

        if (!$order) {
            $this->renderJS(
                'errorDeleteAlert',
                'true',
                '/dashboard/orders'
            );

            return;
        }

        $this->entityManager->remove($order);
        $this->entityManager->flush();

        $this->renderJS(
            'deleteAlert',
            'true',
            '/dashboard/orders'
        );
    }
}
