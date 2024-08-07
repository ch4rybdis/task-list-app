@extends('layouts.app')

@section('title', 'The list of tasks')
@section('content')
    <nav class="mb-4"> <a href="{{ route('tasks.create') }}"><button class="btn btn-primary">Add Task</button></a>
    </nav>


    @forelse($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}" @class(['line-through' => $task->completed])>{{ $task->title }}</a>
        </div>
    @empty
        <div>There are no tasks</div>
    @endforelse

    <div class="mt-4">{!! $tasks->links() !!}</div>

@endsection
