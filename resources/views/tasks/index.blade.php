@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Todo App by <span><a href="https://www.instagram.com/rifpage/" target="_blank" >@RIFAI</a></span></h1>
    <form method="GET" action="{{ route('tasks.index') }}" class="mb-3">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search tasks..." class="form-control">
    </form>
    <a href="{{ route('tasks.create') }}" class="mb-3 btn btn-primary">Add Task</a>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Date Created</th> <!-- Kolom baru -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->formatted_date }}</td> <!-- Tampilkan tanggal -->
                    <td>
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $tasks->links() }}
</div>
@endsection
