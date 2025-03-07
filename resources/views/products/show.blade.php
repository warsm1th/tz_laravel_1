@extends('layouts.main')

@section('title', 'Просмотр товара')

@section('content')
    <h1>Товар: {{ $product->name }}</h1>
    <p><strong>Категория:</strong> {{ $product->category->name }}</p>
    <p><strong>Описание:</strong> {{ $product->description }}</p>
    <p><strong>Цена:</strong> {{ $product->price }} руб.</p>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Назад</a>
@endsection