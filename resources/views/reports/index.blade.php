@extends('layouts.admin')

@section('content')

<div class="w-full space-y-8">

    <div class="flex items-center justify-between mb-8">

        <div>

            <h1 class="text-4xl font-bold text-slate-900">

                Reports & Analytics

            </h1>

            <p class="text-slate-500 mt-2">

                Generate reports and monitor internship performance.

            </p>

        </div>

        <div class="flex gap-3">

            <a href="#"
               class="btn-primary">

                Export PDF

            </a>

            <a href="#"
               class="px-6 py-3 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-50 transition">

                Export Excel

            </a>

        </div>

    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 mb-8 w-full">

        <x-kpi-card
        title="Interns"
        :value="$totalInterns"/>

        <x-kpi-card
        title="Attendance"
        :value="$attendanceCount"/>

        <x-kpi-card
        title="Documents"
        :value="$documentCount"/>

        <x-kpi-card
        title="Reviews"
        :value="$reviewCount"/>

    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8 w-full">

        <div class="bg-white rounded-2xl shadow-md p-6 h-[340px]">

            <h2 class="font-semibold mb-4">

                Monthly Performance

            </h2>

            <canvas id="reportBarChart"></canvas>

        </div>

        <div class="bg-white rounded-2xl shadow-md p-6 h-[340px]">

            <h2 class="font-semibold mb-4">

                Intern Distribution

            </h2>

            <canvas id="reportPieChart"></canvas>

        </div>

    </div>

    <div class="bg-white rounded-2xl shadow-md p-6">

        <h2 class="text-lg font-semibold text-slate-800 mb-4">

            Latest Reports

        </h2>

        <p class="text-slate-500">

            Report data will be loaded here.

        </p>

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

        // Bar Chart
        const barCanvas = document.getElementById('reportBarChart');
        if (barCanvas) {
            const barCtx = barCanvas.getContext('2d');
            new Chart(barCtx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Performance',
                        data: [65, 70, 75, 72, 78, 82],
                        backgroundColor: corporateColors,
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

        // Pie Chart
        const pieCanvas = document.getElementById('reportPieChart');
        if (pieCanvas) {
            const pieCtx = pieCanvas.getContext('2d');
            new Chart(pieCtx, {
                type: 'pie',
                data: {
                    labels: ['ICT', 'Engineering', 'HR', 'Finance', 'Marketing'],
                    datasets: [{
                        data: [30, 25, 20, 15, 10],
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
    });
</script>

@endsection