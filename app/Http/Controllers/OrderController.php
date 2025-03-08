<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Services\OrderService;

class OrderController extends Controller
{
    public function __construct(protected OrderService $orderService)
    {
        
    }

    public function index()
    {
        $orders = $this->orderService->getOrders();

        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $products = $this->orderService->getProducts();
        $statuses = $this->orderService->getStatuses();
        return view('orders.create', compact('products', 'statuses'));
    }

    public function store(OrderRequest $request)
    {
        $this->orderService->createOrder($request);

        return redirect()->route('orders.index')->with('success', 'Заказ успешно создан.');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $products = $this->orderService->getProducts();
        $created_at = $this->orderService->getCreatedDate($order);

        return view('orders.edit', compact('order', 'products', 'created_at'));
    }

    public function update(OrderRequest $request, Order $order)
    {
        $this->orderService->updateOrder($request, $order);
        
        return redirect()->route('orders.index')->with('success', 'Заказ успешно обновлен.');
    }

    public function destroy(Order $order)
    {
        $this->orderService->deleteOrder($order);
        return redirect()->route('orders.index')->with('success', 'Заказ успешно удален.');
    }
}
