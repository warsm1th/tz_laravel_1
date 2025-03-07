<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('product')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $products = Product::all();
        $status = Order::getStatus();
        return view('orders.create', compact('products', 'status'));
    }

    public function store(OrderRequest $request)
    {
        $validatedData = $request->validated();

        Order::create($validatedData);

        return redirect()->route('orders.index')->with('success', 'Заказ успешно создан.');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $products = Product::all();

        $created_at = Carbon::parse($order->created_at)->format('Y-m-d\TH:i');
        return view('orders.edit', compact('order', 'products', 'created_at'));
    }

    public function update(OrderRequest $request, Order $order)
    {
        $validatedData = $request->validated();

        $order->update($validatedData);

        return redirect()->route('orders.index')->with('success', 'Заказ успешно обновлен.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Заказ успешно удален.');
    }
}
