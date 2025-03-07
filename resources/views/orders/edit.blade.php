@extends('layouts.main')

@section('title', 'Редактирование заказа')

@section('content')
    <h1>Редактировать заказ</h1>
    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="customer_name">ФИО покупателя:</label>
            <input type="text" name="customer_name" id="customer_name" class="form-control" value="{{ $order->customer_name }}" required>
        </div>
        <div class="form-group">
            <label for="product_id">Товар:</label>
            <select name="product_id" id="product_id" class="form-control" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ $product->id == $order->product_id ? 'selected' : '' }}>{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">Количество:</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $order->quantity }}" required>
        </div>
        <div class="form-group">
            <label for="created_at">Дата создания:</label>
            <input type="datetime-local" name="created_at" id="created_at" class="form-control" value="{{ $created_at }}" required>
        </div>
        <div class="form-group">
            <label for="status">Статус:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="new" {{ $order->status == 'new' ? 'selected' : '' }}>Новый</option>
                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Выполнен</option>
            </select>
        </div>
        <div class="form-group">
            <label for="comment">Комментарий:</label>
            <textarea name="comment" id="comment" class="form-control">{{ $order->comment }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
@endsection