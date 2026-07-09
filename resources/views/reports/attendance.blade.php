@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto p-6">

<h1 class="text-3xl font-bold mb-6">

Attendance Report

</h1>

<div class="bg-white rounded-xl shadow overflow-hidden">

<table class="w-full">

<thead class="bg-gray-100">

<tr>

<th class="p-4">Intern</th>

<th class="p-4">Date</th>

<th class="p-4">Status</th>

</tr>

</thead>

<tbody>

@foreach($attendance as $record)

<tr class="border-t">

<td class="p-4">

{{ $record->intern->user->name }}

</td>

<td class="p-4">

{{ $record->date }}

</td>

<td class="p-4">

{{ $record->status }}

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

@endsection