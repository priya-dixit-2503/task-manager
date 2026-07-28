@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <h2 class="mb-4">Task Manager</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">
        Add Task
    </a>

    <table class="table table-bordered table-striped">

        <thead class="table-dark">

        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th width="220">Action</th>
        </tr>

        </thead>

        <tbody>

        @forelse($tasks as $task)

        <tr>

            <td>{{ $task->id }}</td>

            <td>{{ $task->title }}</td>

            <td>{{ $task->description }}</td>

            <td>
                @if($task->completed)
                    <span class="badge bg-success">Completed</span>
                @else
                    <span class="badge bg-warning text-dark">Pending</span>
                @endif
            </td>

            <td>

                <a href="{{ route('tasks.edit',$task->id) }}"
                   class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form action="{{ route('tasks.destroy',$task->id) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Are you sure?')">
                        Delete
                    </button>

                </form>

            </td>

        </tr>

        @empty

        <tr>
            <td colspan="5" class="text-center">
                No Tasks Found
            </td>
        </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection