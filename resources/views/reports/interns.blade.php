@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto p-6">

<h1 class="text-3xl font-bold mb-6">

Intern Report

</h1>

<div class="bg-white rounded-xl shadow overflow-hidden">

<table class="w-full">

<thead class="bg-gray-100">

<tr>

<th class="p-4 text-left">Name</th>

<th class="p-4 text-left">University</th>

<th class="p-4 text-left">Department</th>

<th class="p-4 text-left">Supervisor</th>

<th class="p-4 text-left">Status</th>

</tr>

</thead>

<tbody>

@foreach($interns as $intern)

<tr class="border-t">

<td class="p-4">

{{ $intern->user->name }}

</td>

<td class="p-4">

{{ $intern->university->name }}

</td>

<td class="p-4">

{{ $intern->department->name }}

</td>

<td class="p-4">

{{ $intern->supervisor->user->name }}

</td>

<td class="p-4">

<span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">

{{ $intern->status }}

</span>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

@endsection