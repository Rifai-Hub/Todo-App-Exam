<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::query();

        // Fitur Pencarian
        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Pagination
        $tasks = $query->orderBy('created_at', 'desc')->paginate(5);

        // Menambahkan format tanggal pada setiap tugas
        $tasks->getCollection()->transform(function ($task) {
            $task->formatted_date = Carbon::parse($task->created_at)->format('d M Y'); // Format: 04 Dec 2024
            return $task;
        });

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'status' => 'required|in:pending,completed',
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'status' => 'required|in:pending,completed',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
