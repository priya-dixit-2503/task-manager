<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $tasks = Task::latest()->get();

    return view('tasks.index', compact('tasks'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('tasks.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|max:255',
        'description' => 'nullable',
    ]);

    Task::create([
        'title' => $request->title,
        'description' => $request->description,
        'completed' => false,
    ]);

    return redirect()->route('tasks.index')
                     ->with('success', 'Task Added Successfully');
}

    /**
     * Display the specified resource.
     */
    /**
 * Display the specified resource.
 */
public function show(Task $task)
{
    return view('tasks.show', compact('task'));
}

/**
 * Show the form for editing the specified resource.
 */
public function edit(Task $task)
{
    return view('tasks.edit', compact('task'));
}

public function update(Request $request, Task $task)
{
    $request->validate([
        'title' => 'required|max:255',
        'description' => 'nullable',
    ]);

    $task->update([
        'title' => $request->title,
        'description' => $request->description,
        'completed' => $request->has('completed'),
    ]);

    return redirect()->route('tasks.index')
                     ->with('success', 'Task Updated Successfully');
}

public function destroy(Task $task)
{
    $task->delete();

    return redirect()->route('tasks.index')
                     ->with('success', 'Task Deleted Successfully');
}
}
