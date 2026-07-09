@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto p-6">


    @if(session('success'))

        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
            {{ session('success') }}
        </div>

    @endif



    <div class="flex justify-between items-center mb-6">


<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">


<div class="bg-white shadow rounded-xl p-6">

<p class="text-gray-500">
Today's Records
</p>

<h2 class="text-3xl font-bold">
{{ $todayAttendance }}
</h2>

</div>



<div class="bg-white shadow rounded-xl p-6">

<p class="text-gray-500">
Present Today
</p>

<h2 class="text-3xl font-bold text-green-600">
{{ $presentToday }}
</h2>

</div>



<div class="bg-white shadow rounded-xl p-6">

<p class="text-gray-500">
Late Today
</p>

<h2 class="text-3xl font-bold text-yellow-600">
{{ $lateToday }}
</h2>

</div>


</div>

        <div>

            <h1 class="text-3xl font-bold">
                Attendance Management
            </h1>

            <p class="text-gray-500">
                Track intern attendance records
            </p>

        </div>


        <a href="{{ route('attendance.create') }}"
           class="bg-blue-600 text-white px-5 py-3 rounded-lg hover:bg-blue-700">

            + Mark Attendance

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
                        Date
                    </th>


                    <th class="px-6 py-4 text-left">
                        Check In
                    </th>


                    <th class="px-6 py-4 text-left">
                        Status
                    </th>


                    <th class="px-6 py-4 text-left">
                        Remarks
                    </th>


                </tr>


            </thead>



            <tbody>


            @forelse($attendances as $attendance)


                <tr class="border-b hover:bg-gray-50">


                    <td class="px-6 py-4 font-medium">

                        {{ $attendance->intern->user->name }}

                    </td>


                    <td class="px-6 py-4">

                        {{ \Carbon\Carbon::parse($attendance->date)->format('d M Y') }}

                    </td>


                    <td class="px-6 py-4">

                        {{ $attendance->check_in ?? '-' }}

                    </td>



                    <td class="px-6 py-4">


                        @php

                        $styles = [

                            'Present'=>'bg-green-100 text-green-700',

                            'Late'=>'bg-yellow-100 text-yellow-700',

                            'Absent'=>'bg-red-100 text-red-700',

                            'Leave'=>'bg-blue-100 text-blue-700',

                        ];

                        @endphp



                        <span class="px-3 py-1 rounded-full {{ $styles[$attendance->status] }}">

                            {{ $attendance->status }}

                        </span>


                    </td>



                    <td class="px-6 py-4">

                        {{ $attendance->remarks ?? '-' }}

                    </td>


                </tr>


            @empty


                <tr>

                    <td colspan="5"
                        class="text-center p-10 text-gray-500">

                        No attendance records yet.

                    </td>

                </tr>


            @endforelse


            </tbody>


        </table>


    </div>


</div>


@endsection