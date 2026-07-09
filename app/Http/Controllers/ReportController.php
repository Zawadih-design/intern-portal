<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Intern;
use App\Models\PerformanceReview;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    public function interns()
    {
        $interns = Intern::with([
            'user',
            'department',
            'university',
            'supervisor.user'
        ])->get();

        return view('reports.interns', compact('interns'));
    }

    public function attendance()
    {
        $attendance = Attendance::with('intern.user')
            ->latest()
            ->get();

        return view('reports.attendance', compact('attendance'));
    }

    public function performance()
    {
        $reviews = PerformanceReview::with([
            'intern.user',
            'supervisor.user'
        ])->latest()->get();

        return view('reports.performance', compact('reviews'));
    }
}