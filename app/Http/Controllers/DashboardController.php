<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Intern;
use App\Models\Supervisor;
use App\Models\University;

class DashboardController extends Controller
{
    public function index()
    {

$departments = Department::withCount('interns')->get();

        return view('dashboard', [
            'totalInterns' => Intern::count(),
            'totalDepartments' => Department::count(),
            'totalUniversities' => University::count(),
            'totalSupervisors' => Supervisor::count(),
            'departments' => $departments,
        ]);
    }
}