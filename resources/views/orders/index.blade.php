@extends('layouts.main')

@section('title', 'Заказы')

@section('content')
    <h1>Заказы</h1>
    <a href="{{ route('orders.create') }}" class="btn btn-success">Создать заказ</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Покупатель</th>
                <th>Товар</th>
                <th>Количество</th>
                <th>Статус</th>
                <th>Стоимость</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->product->name }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->product->price * $order->quantity }}</td>
                    <td>
                        <a href="{{ route('orders.show', $order) }}" class="btn btn-info">Просмотр</a>
                        <a href="{{ route('orders.edit', $order) }}" class="btn btn-warning">Редактировать</a>
                        <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection