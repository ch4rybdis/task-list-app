@extends('layouts.app')


@section('title', isset($task) ? 'Edit Task' : 'Add Task')


@section('styles')
    <style>
        .error-message {

            color: red;
            font-size: 0.8rem;

        }
    </style>
@endsection

@section('content')
    <form action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}" method="POST">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div class="mb-3">
            <label class="form-label" for="title">Title</label>
            <input class="form-control" type="text" name="title" id="title" placeholder="title"
                class="border border-danger @error('title')

            @enderror"
                value="{{ $task->title ?? old('title') }}">
            @error('title')
                <p class="error-message"> {{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="description">Description</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="2"
                placeholder="Description here">{{ $task->description ?? old('description') }}</textarea>
            @error('description')
                <p class="error-message"> {{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="longDescription">Long Description</label>
            <textarea class="form-control" name="longDescription" id="longDescription" cols="30" rows="5"
                placeholder="Long description here">{{ $task->longDescription ?? old('longDescription') }}</textarea>
            @error('longDescription')
                <p class="error-message"> {{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">
            @isset($task)
                Update
            @else
                Add Task
            @endisset
        </button>

    </form>



@endsection
