@extends('layouts.main')

@section('title', 'Категории')

@section('content')
    <h1>Категории</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-success">Добавить категорию</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories.show', $category) }}" class="btn btn-info">Просмотр</a>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">Редактировать</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
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