@extends('layouts.app')

@section('content')

<div class="space-y-6">

    {{-- PAGE HEADER --}}
    <div>
        <h1 class="text-3xl font-bold text-gray-800">
            Dashboard
        </h1>
        <p class="text-gray-500 mt-1">
            Intern Lifecycle Management Overview
        </p>
    </div>

    {{-- STATS GRID --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

        <x-dashboard-card title="Total Interns" :value="$totalInterns" />

        <x-dashboard-card title="Departments" :value="$totalDepartments" />

        <x-dashboard-card title="Supervisors" :value="$totalSupervisors" />

        <x-dashboard-card title="Universities" :value="$totalUniversities" />

    </div>

    {{-- ANALYTICS SECTION --}}
    <div class="bg-white rounded-xl shadow p-6">

        <h2 class="text-lg font-semibold mb-4">
            Interns per Department
        </h2>

        <canvas id="departmentChart" 
            data-labels="{{ json_encode($departments->pluck('name')) }}"
            data-values="{{ json_encode($departments->pluck('interns_count')) }}">
        </canvas>

    </div>

    {{-- LOWER SECTION --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- RECENT INTERNS --}}
        <div class="lg:col-span-2 bg-white rounded-xl shadow p-6">

            <h2 class="text-lg font-semibold mb-4">
                Recent Interns
            </h2>

            <p class="text-gray-400">
                We will load latest interns here next step
            </p>

        </div>

        {{-- QUICK ACTIONS --}}
        <div class="bg-white rounded-xl shadow p-6">

            <h2 class="text-lg font-semibold mb-4">
                Quick Actions
            </h2>

            <div class="space-y-3">

                <a href="{{ route('interns.create') }}"
                   class="block bg-blue-600 text-white text-center py-2 rounded-lg hover:bg-blue-700">
                    Add Intern
                </a>

                <a href="{{ route('departments.create') }}"
                   class="block bg-gray-800 text-white text-center py-2 rounded-lg hover:bg-gray-900">
                    Add Department
                </a>

                <a href="{{ route('supervisors.create') }}"
                   class="block bg-green-600 text-white text-center py-2 rounded-lg hover:bg-green-700">
                    Add Supervisor
                </a>

            </div>
<div class="bg-white rounded-xl shadow p-6">

<h2 class="text-lg font-semibold mb-4">
Recent Activity
</h2>


<div class="space-y-4">


@forelse($recentActivities as $activity)

<div class="flex items-start gap-3">

<div class="w-2 h-2 bg-blue-600 rounded-full mt-2"></div>


<div>

<p class="text-sm text-gray-800">
{{ $activity->description }}
</p>


<p class="text-xs text-gray-400">
{{ $activity->created_at->diffForHumans() }}
</p>


</div>

</div>


@empty

<p class="text-gray-400">
No activity yet
</p>

@endforelse


</div>

</div>
        </div>

    </div>

</div>

@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const canvas = document.getElementById('departmentChart');
        const ctx = canvas.getContext('2d');
        
        const labels = JSON.parse(canvas.dataset.labels);
        const values = JSON.parse(canvas.dataset.values);

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Interns',
                    data: values,
                    backgroundColor: '#3b82f6'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    });
</script>