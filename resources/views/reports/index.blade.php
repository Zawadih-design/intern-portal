@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto p-6">

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">
            Reports Center
        </h1>

        <p class="text-gray-500 mt-2">
            View and analyze internship data across the system.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

        <a href="{{ route('reports.interns') }}"
           class="bg-white rounded-xl shadow hover:shadow-lg transition p-6">

            <div class="text-4xl mb-3">👨‍🎓</div>

            <h2 class="font-bold text-xl">
                Intern Report
            </h2>

            <p class="text-gray-500 mt-2">
                View all interns.
            </p>

        </a>



        <a href="{{ route('reports.attendance') }}"
           class="bg-white rounded-xl shadow hover:shadow-lg transition p-6">

            <div class="text-4xl mb-3">📅</div>

            <h2 class="font-bold text-xl">
                Attendance
            </h2>

            <p class="text-gray-500 mt-2">
                Attendance statistics.
            </p>

        </a>



        <a href="{{ route('reports.performance') }}"
           class="bg-white rounded-xl shadow hover:shadow-lg transition p-6">

            <div class="text-4xl mb-3">📈</div>

            <h2 class="font-bold text-xl">
                Performance
            </h2>

            <p class="text-gray-500 mt-2">
                Performance evaluations.
            </p>

        </a>



        <div class="bg-gradient-to-r from-indigo-600 to-blue-600 text-white rounded-xl shadow p-6">

            <div class="text-4xl mb-3">
                🚀
            </div>

            <h2 class="font-bold text-xl">
                More Reports
            </h2>

            <p class="mt-2">
                PDF & Excel exports coming soon.
            </p>

        </div>

    </div>

</div>

@endsection