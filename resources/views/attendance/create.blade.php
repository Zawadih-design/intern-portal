@extends('layouts.app')

@section('content')


<div class="max-w-3xl mx-auto p-6">


<div class="bg-white shadow rounded-xl p-8">


<h1 class="text-2xl font-bold mb-6">
    Mark Attendance
</h1>



@if($errors->any())

<div class="bg-red-100 text-red-700 p-4 rounded mb-5">

<ul>

@foreach($errors->all() as $error)

<li>
{{ $error }}
</li>

@endforeach

</ul>

</div>

@endif




<form method="POST" action="{{ route('attendance.store') }}">

@csrf



<div class="mb-5">

<label class="block mb-2 font-medium">
Intern
</label>


<select name="intern_id"
class="w-full border rounded-lg p-3">


<option value="">
Select Intern
</option>


@foreach($interns as $intern)

<option value="{{ $intern->id }}">

{{ $intern->user->name }}

</option>

@endforeach


</select>

</div>




<div class="mb-5">

<label class="block mb-2 font-medium">
Date
</label>


<input type="date"
name="date"
value="{{ date('Y-m-d') }}"
class="w-full border rounded-lg p-3">


</div>




<div class="mb-5">

<label class="block mb-2 font-medium">
Check In
</label>


<input type="time"
name="check_in"
class="w-full border rounded-lg p-3">


</div>




<div class="mb-5">

<label class="block mb-2 font-medium">
Status
</label>


<select name="status"
class="w-full border rounded-lg p-3">


<option>Present</option>

<option>Late</option>

<option>Absent</option>

<option>Leave</option>


</select>


</div>




<div class="mb-5">


<label class="block mb-2 font-medium">
Remarks
</label>


<textarea
name="remarks"
class="w-full border rounded-lg p-3"
rows="3"></textarea>


</div>




<button
class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">

Save Attendance

</button>



</form>



</div>

</div>


@endsection