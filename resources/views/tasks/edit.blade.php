@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-box" style="background-image: url('{{ asset('images/bg-form2.PNG') }}');">
        <h1>Edit Task</h1>

        <!-- Display validation errors if any -->
        @if ($errors->any())
        <div class="alert alert-danger" 
        style="background-color: #ee6f7a; 
        color: #0e0c0c; 
        border: 1px solid #b63948; 
        border-radius: 5px; 
        padding: 10px; 
        margin-bottom: 10px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Task editing form -->
        <form method="POST" action="{{ route('tasks.update', ['id' => $task->id]) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $task->title) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $task->description) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Task</button>
        </form>
    </div>
</div>
@endsection
