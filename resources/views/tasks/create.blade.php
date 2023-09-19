@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-box" style="background-image: url('{{ asset('images/bg-form1.PNG') }}');">
        <h1>Create a New Task</h1>

        <!-- Display validation errors if any -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Task creation form -->
        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Create Task</button>
        </form>
    </div>
</div>
@endsection
