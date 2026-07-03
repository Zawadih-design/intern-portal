@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Universities</h1>

    <a href="{{ route('universities.create') }}">
        Create University
    </a>

    <hr>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @foreach($universities as $university)

        <div>

            <h3>{{ $university->name }}</h3>

            <p>{{ $university->city }} - {{ $university->country }}</p>

            <form action="{{ route('universities.destroy', $university->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>

        </div>

        <hr>

    @endforeach

</div>

@endsection