@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto py-10 px-6">


    {{-- HEADER --}}
    <div class="flex justify-between items-center mb-8">

        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Task Management
            </h1>

            <p class="text-gray-500 mt-2">
                Manage intern assignments and progress
            </p>
        </div>


        <a href="{{ route('tasks.create') }}"
           class="bg-blue-600 text-white px-5 py-3 rounded-lg shadow hover:bg-blue-700">

            + Create Task

        </a>

    </div>


    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))

        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">

            {{ session('success') }}

        </div>

    @endif



    {{-- TASK TABLE CARD --}}
    <div class="bg-white shadow rounded-xl overflow-hidden">


        <table class="w-full">


            <thead class="bg-gray-100">


                <tr>


                    <th class="text-left p-4">
                        Task
                    </th>


                    <th class="text-left p-4">
                        Intern
                    </th>


                    <th class="text-left p-4">
                        Supervisor
                    </th>


                    <th class="text-left p-4">
                        Priority
                    </th>


                    <th class="text-left p-4">
                        Status
                    </th>


                    <th class="text-left p-4">
                        Deadline
                    </th>


                </tr>


            </thead>


            <tbody>


                @foreach($tasks as $task)


                    <tr class="border-t">


                        <td class="p-4">

                            <div class="font-semibold">

                                {{ $task->title }}

                            </div>


                            <p class="text-sm text-gray-500">

                                {{ Str::limit($task->description,50) }}

                            </p>

                        </td>


                        <td class="p-4">

                            {{ $task->intern->user->name ?? 'N/A' }}

                        </td>


                        <td class="p-4">

                            {{ $task->supervisor->user->name ?? 'N/A' }}

                        </td>


                        <td class="p-4">


                            @if($task->priority == 'High')

                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">

                                    High

                                </span>


                            @elseif($task->priority == 'Medium')


                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">

                                    Medium

                                </span>


                            @else


                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">

                                    Low

                                </span>


                            @endif


                        </td>


                        <td class="p-4">


                            <span class="bg-gray-100 px-3 py-1 rounded-full text-sm">

                                {{ $task->status }}

                            </span>


                        </td>


                        <td class="p-4">

                            {{ $task->deadline }}

                        </td>


                    </tr>


                @endforeach


            </tbody>


        </table>


    </div>


</div>


@endsection