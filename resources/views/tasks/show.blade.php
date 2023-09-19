@extends('layouts.app') <!-- Extend the layout template -->

@section('content')
    <div class="container">
        <h1>{{ $task->title }}</h1>
        <p>{{ $task->description }}</p>
    </div>
@endsection

