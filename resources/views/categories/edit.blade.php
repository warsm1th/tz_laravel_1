@extends('layouts.main')

@section('title', 'Редактирование категории')

@section('content')
    <h1>Редактировать категорию</h1>
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Название:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
@endsection