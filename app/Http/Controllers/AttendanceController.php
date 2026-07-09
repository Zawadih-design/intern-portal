<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Intern;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'supervisor']);
    }

    /**
     * Display attendance records
     */
    public function index()
    {
        $attendances = Attendance::with('intern.user')
            ->latest()
            ->get();

        $today = now()->toDateString();

        $todayAttendance = Attendance::whereDate('date', $today)->count();
        $presentToday = Attendance::whereDate('date', $today)
            ->where('status', 'Present')
            ->count();
        $lateToday = Attendance::whereDate('date', $today)
            ->where('status', 'Late')
            ->count();

        return view('attendance.index', compact(
            'attendances',
            'todayAttendance',
            'presentToday',
            'lateToday'
        ));
    }

    /**
     * Show attendance form
     */
    public function create()
    {
        $interns = Intern::with('user')->get();

        return view('attendance.create', compact('interns'));
    }

    /**
     * Store attendance
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'intern_id' => [
                'required',
                'exists:interns,id'
            ],
            'date' => [
                'required',
                'date'
            ],
            'check_in' => [
                'nullable'
            ],
            'status' => [
                'required',
                'in:Present,Late,Absent,Leave'
            ],
            'remarks' => [
                'nullable',
                'string'
            ],
        ]);

        // Automatic late detection
        if ($validated['check_in'] && $validated['check_in'] > '08:00') {
            $validated['status'] = 'Late';
        }

        Attendance::create($validated);

        return redirect()
            ->route('attendance.index')
            ->with('success', 'Attendance recorded successfully');
    }
}