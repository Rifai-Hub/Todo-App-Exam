@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($task) ? 'Edit Task' : 'Add Task' }}</h1>
    <form method="POST" action="{{ isset($task) ? route('tasks.update', $task) : route('tasks.store') }}">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $task->title ?? old('title') }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $task->description ?? old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pending" {{ (isset($task) && $task->status === 'pending') ? 'selected' : '' }}>Pending</option>
                <option value="completed" {{ (isset($task) && $task->status === 'completed') ? 'selected' : '' }}>Completed</option>
            </select>
        </div>
        <button type="submit" class="mt-3 btn btn-success">{{ isset($task) ? 'Update' : 'Add' }}</button>
    </form>
</div>
@endsection
