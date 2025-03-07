@extends('layouts.main')

@section('title', 'Просмотр категории')

@section('content')
    <h1>Категория: {{ $category->name }}</h1>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Назад</a>
@endsection