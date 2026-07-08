@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Intern Profile</h1>

    <hr>

    <h2>{{ $intern->user->name ?? 'N/A' }}</h2>

    <p><strong>Student Number:</strong> {{ $intern->student_number ?? 'N/A' }}</p>

    <p><strong>University:</strong> {{ $intern->university->name ?? 'N/A' }}</p>

    <p><strong>Department:</strong> {{ $intern->department->name ?? 'N/A' }}</p>

    <p><strong>Supervisor:</strong> {{ $intern->supervisor?->user?->name ?? 'N/A' }}</p>

    <p><strong>Programme:</strong> {{ $intern->programme ?? 'N/A' }}</p>

    <p><strong>Year:</strong> {{ $intern->year_of_study ?? 'N/A' }}</p>

    <p><strong>Phone:</strong> {{ $intern->phone ?? 'N/A' }}</p>

    <p><strong>Emergency Contact:</strong> {{ $intern->emergency_contact ?? 'N/A' }}</p>

    <p><strong>Start Date:</strong> {{ $intern->start_date ?? 'N/A' }}</p>

    <p><strong>End Date:</strong> {{ $intern->end_date ?? 'N/A' }}</p>

    <p><strong>Status:</strong> {{ $intern->status ?? 'N/A' }}</p>

    <hr>

    <a href="{{ route('interns.index') }}">← Back to Interns</a>

</div>

@endsection