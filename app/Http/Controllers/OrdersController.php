<?php

namespace App\Http\Controllers;

use App\Http\Requests\Orders\StoreOrderRequest;
use App\Http\Requests\Orders\UpdateOrderRequest;
use App\Models\Order;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Services\Orders\Dto\StoreOrderDto;
use App\Services\Orders\Dto\UpdateOrderDto;
use App\Services\Orders\Interfaces\OrdersServiceInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(
        OrderRepositoryInterface $orderRepository,
    ): View
    {
        return view(
            'orders.index',
            [
                'orders' => $orderRepository->getAllOrders(),
                'orderStatuses' => Order::STATUSES
            ]
        );
    }

    /**
     * Display a form to create resource.
     *
     * @param ProductRepositoryInterface $productRepository
     * @return View
     */
    public function showCreateForm(
        ProductRepositoryInterface $productRepository,
    ): View
    {
        return view(
            'orders.formOrder',
            [
                'products' => $productRepository->getAllProducts(),
                'orderStatuses' => Order::STATUSES
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        StoreOrderRequest $storeOrderRequest,
        OrdersServiceInterface $ordersService
    ): RedirectResponse
    {
        if (
            $ordersService->storeOrder(
                new StoreOrderDto(
                    $storeOrderRequest->get('product_id'),
                    $storeOrderRequest->get('product_count'),
                    $storeOrderRequest->get('customer_name'),
                    $storeOrderRequest->get('comment'),
                )
            )
        ) {
            return redirect()->route('orders.index');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Order $order
    ): View
    {
        return view(
            'orders.formOrder',
            [
                'order' => $order,
                'orderStatuses' => Order::STATUSES
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Order $order,
        UpdateOrderRequest $orderRequest,
        OrdersServiceInterface $ordersService
    ): RedirectResponse
    {
        if (
            $ordersService->updateOrder(
                new UpdateOrderDto(
                    $order->id,
                    $orderRequest->get('status')
                )
            )
        ) {
            return redirect()->route('orders.index');
        }

        return redirect()->back();
    }
}
