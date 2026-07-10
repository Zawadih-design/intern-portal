@extends('layouts.admin')

@section('content')

<div class="w-full space-y-8">

    <div>

        <h1 class="text-4xl font-bold text-slate-900">

            Good {{ now()->hour < 12 ? 'Morning' : (now()->hour < 17 ? 'Afternoon' : 'Evening') }},

            {{ Auth::user()->name }}

        </h1>

        <p class="text-slate-500 mt-2">

            Welcome back. Here's what's happening across the internship programme.

        </p>

    </div>

    <div>

        <h1 class="text-3xl font-bold text-gray-800">

            Dashboard

        </h1>

        <p class="text-gray-500 mt-1">

            Intern Lifecycle Management Overview

        </p>

    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 w-full">

        <x-kpi-card
        title="Interns"
        :value="$totalInterns">

        <x-icons.users class="w-8 h-8 text-orange-500"/>

        </x-kpi-card>

        <x-kpi-card
        title="Departments"
        :value="$totalDepartments">

        <x-icons.building class="w-8 h-8 text-orange-500"/>

        </x-kpi-card>

        <x-kpi-card
        title="Supervisors"
        :value="$totalSupervisors">

        <x-icons.academic class="w-8 h-8 text-orange-500"/>

        </x-kpi-card>

        <x-kpi-card
        title="Universities"
        :value="$totalUniversities">

        <x-icons.chart class="w-8 h-8 text-orange-500"/>

        </x-kpi-card>

    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 w-full">

        <div class="bg-white rounded-2xl shadow-md p-6 h-[330px]">

            <h2 class="text-lg font-semibold text-slate-800 mb-4">

                Intern Performance

            </h2>

            <canvas id="performanceChart"></canvas>

        </div>

        <div class="bg-white rounded-2xl shadow-md p-6 h-[330px]">

            <h2 class="text-lg font-semibold text-slate-800 mb-4">

                Department Distribution

            </h2>

            <canvas id="departmentChart"
                data-labels="{{ json_encode($departmentLabels) }}"
                data-values="{{ json_encode($departmentValues) }}"></canvas>

        </div>

    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 w-full">

        <div class="lg:col-span-2">

            <x-activity-card
            :activities="$recentActivities"/>

        </div>

        <div>

            <x-quick-actions/>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const corporateColors = [
            "#0F172A",
            "#334155",
            "#475569",
            "#64748B",
            "#94A3B8",
            "#CBD5E1"
        ];

        // Performance Chart (Doughnut)
        const perfCanvas = document.getElementById('performanceChart');
        if (perfCanvas) {
            const perfCtx = perfCanvas.getContext('2d');
            new Chart(perfCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Excellent', 'Good', 'Average', 'Needs Attention'],
                    datasets: [{
                        data: [35, 40, 20, 5],
                        backgroundColor: corporateColors,
                        borderWidth: 0,
                        hoverOffset: 8
                    }]
                },
                options: {
                    responsive: true,
                    cutout: '70%',
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 20,
                                usePointStyle: true
                            }
                        }
                    }
                }
            });
        }

        // Department Chart (Bar)
        const deptCanvas = document.getElementById('departmentChart');
        if (deptCanvas) {
            const deptCtx = deptCanvas.getContext('2d');
            const labels = JSON.parse(deptCanvas.dataset.labels || '[]');
            const values = JSON.parse(deptCanvas.dataset.values || '[]');

            new Chart(deptCtx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Interns',
                        data: values,
                        backgroundColor: "#0F172A",
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            grid: {
                                color: "#E2E8F0"
                            },
                            beginAtZero: true
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        }
    });
</script>

@endsection