@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto p-6">

<h1 class="text-3xl font-bold mb-6">

Performance Report

</h1>

<div class="bg-white rounded-xl shadow overflow-hidden">

<table class="w-full">

<thead class="bg-gray-100">

<tr>

<th class="p-4">Intern</th>

<th class="p-4">Supervisor</th>

<th class="p-4">Score</th>

<th class="p-4">Review Date</th>

</tr>

</thead>

<tbody>

@foreach($reviews as $review)

<tr class="border-t">

<td class="p-4">

{{ $review->intern->user->name }}

</td>

<td class="p-4">

{{ $review->supervisor->user->name }}

</td>

<td class="p-4">

{{ $review->overall_score }}%

</td>

<td class="p-4">

{{ $review->review_date }}

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

@endsection