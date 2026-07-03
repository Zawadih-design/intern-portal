@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Create Supervisor</h1>

    <form method="POST" action="{{ route('supervisors.store') }}">
        @csrf

        <label>User</label>
        <select name="user_id">
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>

        <br><br>

        <label>Department</label>
        <select name="department_id">
            @foreach($departments as $department)
                <option value="{{ $department->id }}">{{ $department->name }}</option>
            @endforeach
        </select>

        <br><br>

        <input type="text" name="position" placeholder="Position">

        <br><br>

        <input type="text" name="phone" placeholder="Phone">

        <br><br>

        <button type="submit">Save</button>

    </form>

</div>

@endsection