@extends('layouts.app')

@section('content')
    <h1>Создать задачу</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <label>Название:
            <input type="text" name="title" required style="width: 300px;">
        </label>
        <br><br>
        <label>Описание:
            <textarea name="description" rows="4" style="width: 300px;"></textarea>
        </label>
        <br><br>
        <label>Статус:
            <select name="status">
                <option value="in_progress">В работе</option>
                <option value="completed">Завершено</option>
            </select>
        </label>
        <br><br>
        <button type="submit">Сохранить</button>
    </form>
@endsection
