@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Interns</h1>

    <a href="{{ route('interns.create') }}">Create Intern</a>

    <hr>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @foreach($interns as $intern)

        <div>

            <h3>{{ $intern->user->name }}</h3>

            <p>University: {{ $intern->university->name }}</p>

            <p>Department: {{ $intern->department->name }}</p>

            <p>Supervisor: {{ $intern->supervisor->user->name }}</p>

            <p>Student No: {{ $intern->student_number }}</p>

            <p>Status: {{ $intern->status }}</p>

            <a href="{{ route('interns.show', $intern->id) }}">View Profile</a>

            <form method="POST" action="{{ route('interns.destroy', $intern->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>

        </div>

        <hr>

    @endforeach

</div>

@endsection
