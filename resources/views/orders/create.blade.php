@extends('layouts.main')

@section('title', 'Создание заказа')

@section('content')
    <h1>Создать заказ</h1>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="customer_name">ФИО покупателя:</label>
            <input type="text" name="customer_name" id="customer_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="product_id">Товар:</label>
            <select name="product_id" id="product_id" class="form-control" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">Количество:</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="created_at">Дата создания:</label>
            <input type="datetime-local" name="created_at" id="created_at" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="status">Статус:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="new">Новый</option>
                <option value="completed">Выполнен</option>
            </select>
        </div>
        <div class="form-group">
            <label for="comment">Комментарий:</label>
            <textarea name="comment" id="comment" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Создать</button>
    </form>
@endsection