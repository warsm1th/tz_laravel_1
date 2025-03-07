<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
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
        return view('orders.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'created_at' => 'required|date',
            'status' => 'nullable|in:new,completed',
            'comment' => 'nullable|string',
        ]);

        Order::create($request->all());

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

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'created_at' => 'required|date',
            'status' => 'nullable|in:new,completed',
            'comment' => 'nullable|string',
        ]);

        $order->update($request->all());

        return redirect()->route('orders.index')->with('success', 'Заказ успешно обновлен.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Заказ успешно удален.');
    }
}
