@extends('layouts.main')

@section('title', 'Просмотр заказа')

@section('content')
    <h1>Заказ #{{ $order->id }}</h1>
    <p><strong>Покупатель:</strong> {{ $order->customer_name }}</p>
    <p><strong>Товар:</strong> {{ $order->product->name }}</p>
    <p><strong>Количество:</strong> {{ $order->quantity }}</p>
    <p><strong>Дата создания:</strong> {{ $order->created_at }}</p>
    <p><strong>Статус:</strong> {{ $order->status }}</p>
    <p><strong>Стоимость:</strong> {{ $order->product->price * $order->quantity }}</p>
    <p><strong>Комментарий:</strong> {{ $order->comment }}</p>
    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Назад</a>
@endsection