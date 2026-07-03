@extends('layouts.app')

@section('content')
    <h1>Редактировать задачу</h1>
    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Название:
            <input type="text" name="title" value="{{ $task->title }}" required style="width: 300px;">
        </label>
        <br><br>
        <label>Описание:
            <textarea name="description" rows="4" style="width: 300px;">{{ $task->description }}</textarea>
        </label>
        <br><br>
        <label>Статус:
            <select name="status">
                <option value="in_progress" {{ $task->status === 'in_progress' ? 'selected' : '' }}>В работе</option>
                <option value="completed" {{ $task->status === 'completed' ? 'selected' : '' }}>Завершено</option>
            </select>
        </label>
        <br><br>
        <label>Добавить минут к задаче:
            <input type="number" name="add_minutes" min="0" placeholder="Например, 30">
        </label>
        <p style="font-size: 0.9em; color: #666;">Текущее время: {{ $task->time_spent_minutes }} мин.</p>
        <br>
        <button type="submit">Обновить</button>
        <a href="{{ route('tasks.index') }}">Отмена</a>
    </form>
@endsection
