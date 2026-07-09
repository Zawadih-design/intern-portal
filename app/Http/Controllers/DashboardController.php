<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Intern;
use App\Models\Supervisor;
use App\Models\University;
use App\Models\ActivityLog;
use App\Models\PerformanceReview;

class DashboardController extends Controller
{
    public function index()
    {

    $averagePerformance = PerformanceReview::avg('overall_score');


$totalReviews = PerformanceReview::count();


$highestPerformer = PerformanceReview::with('intern.user')
    ->orderByDesc('overall_score')
    ->first();



$needsAttention = PerformanceReview::where(
    'overall_score',
    '<',
    50
)->count();

$departments = Department::withCount('interns')->get();

        return view('dashboard', [
            'totalInterns' => Intern::count(),
            'totalDepartments' => Department::count(),
            'totalUniversities' => University::count(),
            'totalSupervisors' => Supervisor::count(),
            'departments' => $departments,
            'recentActivities' => ActivityLog::latest()
                ->take(5)
                ->get(),
            'averagePerformance' => $averagePerformance,
            'totalReviews' => $totalReviews,
            'highestPerformer' => $highestPerformer,
            'needsAttention' => $needsAttention,
        ]);

    }
}