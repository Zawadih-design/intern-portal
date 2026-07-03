@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Intern Profile</h1>

    <hr>

    <h2>{{ $intern->user->name }}</h2>

    <p><strong>Student Number:</strong> {{ $intern->student_number }}</p>

    <p><strong>University:</strong> {{ $intern->university->name }}</p>

    <p><strong>Department:</strong> {{ $intern->department->name }}</p>

    <p><strong>Supervisor:</strong> {{ $intern->supervisor->user->name }}</p>

    <p><strong>Programme:</strong> {{ $intern->programme }}</p>

    <p><strong>Year:</strong> {{ $intern->year_of_study }}</p>

    <p><strong>Phone:</strong> {{ $intern->phone }}</p>

    <p><strong>Emergency Contact:</strong> {{ $intern->emergency_contact }}</p>

    <p><strong>Start Date:</strong> {{ $intern->start_date }}</p>

    <p><strong>End Date:</strong> {{ $intern->end_date }}</p>

    <p><strong>Status:</strong> {{ $intern->status }}</p>

    <hr>

    <a href="{{ route('interns.index') }}">← Back to Interns</a>

</div>

@endsection