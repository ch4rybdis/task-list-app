@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <div><a href="{{ route('tasks.index') }}"><button class="btn btn-warning" style="margin-bottom: 15px"><- Listeye
                    Dön</button></a>
    </div>

    <p class="mb-4">{{ $task->description }}</p>

    @if ($task->longDescription)
        <p class="mb-4">{{ $task->longDescription }}</p>
    @endif
    <p class="mb-4">
        @if ($task->completed)
            <span class="text-success">Completed</span>
        @else
            <span class="text-danger">Not completed</span>
        @endif
    </p>
    <p class="mb-4 text-sm">Created {{ $task->created_at->diffForHumans() }} • Updated
        {{ $task->updated_at->diffForHumans() }}
    </p>

    <div style="margin-bottom: 10px">
        <form action="{{ route('tasks.toggle', ['task' => $task]) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-secondary">
                Mark as {{ $task->completed ? 'not completed' : 'completed' }}
            </button>
        </form>
    </div>

    <a href="{{ route('tasks.edit', ['task' => $task->id]) }}"><button class="btn btn-primary"
            style="margin-bottom: 10px">Güncelle</button></a>

    <div>
        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" style="margin-bottom: 10px">Delete</button>
        </form>
    </div>

@endsection
