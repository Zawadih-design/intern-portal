@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto py-10 px-6">


<h1 class="text-3xl font-bold mb-8">
Create New Task
</h1>

@if ($errors->any())
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
    <ul class="list-disc list-inside">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('tasks.store') }}"
      method="POST"
      class="bg-white shadow rounded-xl p-8">

@csrf


<label class="block mb-2 font-semibold">
Intern
</label>


<select name="intern_id"
        class="w-full border rounded-lg p-3 mb-5">


<option>
Select Intern
</option>


@foreach($interns as $intern)

<option value="{{ $intern->id }}">

{{ $intern->user->name ?? 'N/A' }}

</option>

@endforeach


</select>


<label class="block mb-2 font-semibold">
Supervisor
</label>


<select name="supervisor_id"
        class="w-full border rounded-lg p-3 mb-5">


<option>
Select Supervisor
</option>


@foreach($supervisors as $supervisor)

<option value="{{ $supervisor->id }}">

{{ $supervisor->user->name ?? 'N/A' }}

</option>

@endforeach


</select>


<label>
Task Title
</label>


<input type="text"
       name="title"
       class="w-full border rounded-lg p-3 mb-5">



<label>
Description
</label>


<textarea name="description"
          class="w-full border rounded-lg p-3 mb-5"></textarea>



<label>
Priority
</label>


<select name="priority"
        class="w-full border rounded-lg p-3 mb-5">


<option>
Low
</option>

<option>
Medium
</option>

<option>
High
</option>


</select>



<label>
Deadline
</label>


<input type="date"
       name="deadline"
       class="w-full border rounded-lg p-3 mb-5">



<button
class="bg-blue-600 text-white px-6 py-3 rounded-lg">

Create Task

</button>


</form>


</div>

@endsection