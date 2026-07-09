@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto p-6">

<div class="bg-white rounded-xl shadow p-8">

<h1 class="text-2xl font-bold mb-6">

Upload Document

</h1>

<form method="POST"
      action="{{ route('documents.store') }}"
      enctype="multipart/form-data">

@csrf

<div class="mb-5">

<label class="block mb-2 font-medium">

Title

</label>

<input type="text"
       name="title"
       class="w-full border rounded-lg p-3"
       required>

</div>

<div class="mb-5">

<label class="block mb-2 font-medium">

Document Type

</label>

<select name="type"
        class="w-full border rounded-lg p-3">

<option>CV</option>

<option>Letter</option>

<option>Report</option>

<option>Certificate</option>

<option>Other</option>

</select>

</div>

<div class="mb-5">

<label class="block mb-2 font-medium">

Choose File

</label>

<input type="file"
       name="file"
       class="w-full border rounded-lg p-3"
       required>

</div>

<button
class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg">

Upload Document

</button>

</form>

</div>

</div>

@endsection