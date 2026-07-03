@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Create Intern</h1>

    <form method="POST" action="{{ route('interns.store') }}">
        @csrf

        <label>User</label>
        <select name="user_id">
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>

        <br><br>

        <label>University</label>
        <select name="university_id">
            @foreach($universities as $uni)
                <option value="{{ $uni->id }}">{{ $uni->name }}</option>
            @endforeach
        </select>

        <br><br>

        <label>Department</label>
        <select name="department_id">
            @foreach($departments as $dep)
                <option value="{{ $dep->id }}">{{ $dep->name }}</option>
            @endforeach
        </select>

        <br><br>

        <label>Supervisor</label>
        <select name="supervisor_id">
            @foreach($supervisors as $sup)
                <option value="{{ $sup->id }}">{{ $sup->user->name }}</option>
            @endforeach
        </select>

        <br><br>

        <input type="text" name="student_number" placeholder="Student Number">

        <br><br>

        <input type="text" name="programme" placeholder="Programme">

        <br><br>

        <input type="number" name="year_of_study" placeholder="Year of Study">

        <br><br>

        <input type="text" name="phone" placeholder="Phone">

        <br><br>

        <input type="text" name="emergency_contact" placeholder="Emergency Contact">

        <br><br>

        <input type="date" name="start_date">

        <br><br>

        <input type="date" name="end_date">

        <br><br>

        <button type="submit">Save Intern</button>

    </form>

</div>

@endsection