@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto p-6">

    @if(session('success'))

    <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">

        {{ session('success') }}

    </div>

    @endif

    <div class="flex justify-between items-center mb-6">

        <div>

            <h1 class="text-3xl font-bold">
                Performance Reviews
            </h1>

            <p class="text-gray-500">
                Monitor intern performance evaluations
            </p>

        </div>

        <a href="{{ route('performance.create') }}"
           class="bg-blue-600 text-white px-5 py-3 rounded-lg">

            + New Evaluation

        </a>

    </div>

    <div class="bg-white shadow rounded-xl overflow-hidden">

        <table class="min-w-full">

            <thead class="bg-gray-100">

                <tr>

                    <th class="px-6 py-4 text-left">
                        Intern
                    </th>

                    <th class="px-6 py-4 text-left">
                        Supervisor
                    </th>

                    <th class="px-6 py-4 text-left">
                        Score
                    </th>

                    <th class="px-6 py-4 text-left">
                        Date
                    </th>

                </tr>

            </thead>

            <tbody>

            @forelse($reviews as $review)

                <tr class="border-b">

                    <td class="px-6 py-4">

                        {{ $review->intern->user->name ?? 'No user linked' }}

                    </td>

                    <td class="px-6 py-4">

                        {{ $review->supervisor->user->name ?? 'No user linked' }}

                    </td>

                    <td class="px-6 py-4">

                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full">

                            {{ $review->overall_score }}%

                        </span>

                    </td>

                    <td class="px-6 py-4">

                        {{ \Carbon\Carbon::parse($review->review_date)->format('d M Y') }}

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="4"
                        class="text-center p-10 text-gray-500">

                        No performance reviews yet.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection