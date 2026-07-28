@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h2>Edit Task</h2>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title</label>

            <input
                type="text"
                name="title"
                class="form-control"
                value="{{ $task->title }}"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>

            <textarea
                name="description"
                class="form-control"
                rows="4"
            >{{ $task->description }}</textarea>
        </div>

        <div class="form-check mb-3">
            <input
                class="form-check-input"
                type="checkbox"
                name="completed"
                value="1"
                {{ $task->completed ? 'checked' : '' }}
            >

            <label class="form-check-label">
                Mark as Completed
            </label>
        </div>

        <button type="submit" class="btn btn-primary">
            Update Task
        </button>

        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
            Back
        </a>

    </form>

</div>

@endsection