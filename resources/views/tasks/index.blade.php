@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto p-6">

    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 p-4 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-between items-center mb-6">

        <div>
            <h1 class="text-3xl font-bold">
                Task Management
            </h1>

            <p class="text-gray-500">
                Manage and monitor intern assignments
            </p>
        </div>

        <a href="{{ route('tasks.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg">

            + Assign Task

        </a>

    </div>


<li>
    <a href="{{ route('tasks.index') }}">
        Tasks
    </a>
</li>

    <div class="bg-white rounded-xl shadow overflow-hidden">

        <table class="min-w-full">

            <thead class="bg-gray-100">

            <tr>

                <th class="px-6 py-4 text-left">Title</th>

                <th class="px-6 py-4 text-left">Intern</th>

                <th class="px-6 py-4 text-left">Priority</th>

                <th class="px-6 py-4 text-left">Status</th>

                <th class="px-6 py-4 text-left">Deadline</th>

            </tr>

            </thead>

            <tbody>

            @forelse($tasks as $task)

                <tr class="border-b hover:bg-gray-50">

                    <td class="px-6 py-4 font-semibold">

                        {{ $task->title }}

                    </td>

                    <td class="px-6 py-4">

                        {{ $task->intern->user->name }}

                    </td>

                    <td class="px-6 py-4">

                        @switch($task->priority)

                            @case('High')

                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">
                                    High
                                </span>

                            @break

                            @case('Medium')

                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">
                                    Medium
                                </span>

                            @break

                            @default

                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">
                                    Low
                                </span>

                        @endswitch

                    </td>

                    <td class="px-6 py-4">

                        @php

                            $colors = [
                                'Pending'=>'bg-gray-100 text-gray-700',
                                'In Progress'=>'bg-blue-100 text-blue-700',
                                'Submitted'=>'bg-yellow-100 text-yellow-700',
                                'Approved'=>'bg-purple-100 text-purple-700',
                                'Completed'=>'bg-green-100 text-green-700'
                            ];

                        @endphp

                        <span class="px-3 py-1 rounded-full {{ $colors[$task->status] }}">

                            {{ $task->status }}

                        </span>

                    </td>

                    <td class="px-6 py-4">

                        {{ \Carbon\Carbon::parse($task->deadline)->format('d M Y') }}

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center p-10 text-gray-500">

                        No tasks found.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection