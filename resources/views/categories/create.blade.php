@extends('layouts.main')

@section('title', 'Создание категории')

@section('content')
    <h1>Создать категорию</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Название:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Создать</button>
    </form>
@endsection