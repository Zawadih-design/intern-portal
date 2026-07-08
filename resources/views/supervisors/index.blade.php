@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Supervisors</h1>

    <a href="{{ route('supervisors.create') }}">
        Create Supervisor
    </a>

    <hr>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @foreach($supervisors as $supervisor)

        <div>

            <h3>{{ $supervisor->user->name ?? 'N/A' }}</h3>

            <p>Department: {{ $supervisor->department->name ?? 'N/A' }}</p>

            <p>Position: {{ $supervisor->position ?? 'N/A' }}</p>

            <p>Phone: {{ $supervisor->phone ?? 'N/A' }}</p>

            <form method="POST" action="{{ route('supervisors.destroy', $supervisor->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>

        </div>

        <hr>

    @endforeach

</div>

@endsection