@extends('layouts.app')

@section('content')
    <h1>Трекер задач</h1>

    @if(session('success'))
        <div style="color: green; margin-bottom: 1rem;">{{ session('success') }}</div>
    @endif

    <a href="{{ route('tasks.create') }}">+ Создать задачу</a>
    <hr>

    <table border="1" cellpadding="8" style="border-collapse: collapse; width: 100%;">
        <thead>
        <tr>
            <th>Название</th>
            <th>Описание</th>
            <th>Статус</th>
            <th>Время (мин)</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @forelse($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description ?? '-' }}</td>
                <td>
                    @if($task->status === 'in_progress')
                        В работе
                    @else
                        Завершено
                    @endif
                </td>
                <td>{{ $task->time_spent_minutes }}</td>
                <td>
                    <a href="{{ route('tasks.edit', $task) }}">Редактировать</a>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">Нет задач</td></tr>
        @endforelse
        </tbody>
    </table>
@endsection
