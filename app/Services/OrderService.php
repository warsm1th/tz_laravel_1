<?php

namespace App\Services;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;


class OrderService
{
    public function getOrders()
    {
        $orders = Order::with('product')->get();

        return $orders;
    }

    public function getProducts()
    {
        $products = Product::all();

        return $products;
    }

    public function getStatuses()
    {
        return [
            'new' => 'Новый',
            'completed' => 'Выполнен',
        ];

    }

    public function getCreatedDate(Order $order)
    {
        $created_at = Carbon::parse($order->created_at)->format('Y-m-d\TH:i');

        return $created_at;
    }

    public function createOrder(OrderRequest $request)
    {
        $validatedData = $request->validated();

        return Order::create($validatedData);
    }

    public function updateOrder(OrderRequest $request, Order $order)
    {
        $validatedData = $request->validated();
        $order->update($validatedData);

        return $order;
    }

    public function deleteOrder(Order $order)
    {
        $order->delete();
    }
}