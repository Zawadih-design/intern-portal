@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Create University</h1>

    <form method="POST" action="{{ route('universities.store') }}">
        @csrf

        <input type="text" name="name" placeholder="University Name">
        <br><br>

        <input type="text" name="city" placeholder="City">
        <br><br>

        <input type="text" name="country" placeholder="Country">
        <br><br>

        <input type="text" name="website" placeholder="Website">
        <br><br>

        <button type="submit">Save</button>

    </form>

</div>

@endsection