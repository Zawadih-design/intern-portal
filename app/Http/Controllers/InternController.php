<?php

namespace App\Http\Controllers;

use App\Models\Intern;
use App\Models\User;
use App\Models\University;
use App\Models\Department;
use App\Models\Supervisor;
use Illuminate\Http\Request;

class InternController extends Controller

{
    public function index()
    {
        $interns = Intern::with(['user', 'university', 'department', 'supervisor'])->get();
        return view('interns.index', compact('interns'));
    }

    public function show(Intern $intern)
{
    $intern->load(['user', 'university', 'department', 'supervisor']);

    return view('interns.show', compact('intern'));
}

    public function create()
    {
        return view('interns.create', [
            'users' => User::all(),
            'universities' => University::all(),
            'departments' => Department::all(),
            'supervisors' => Supervisor::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'university_id' => 'required|exists:universities,id',
            'department_id' => 'required|exists:departments,id',
            'supervisor_id' => 'required|exists:supervisors,id',
            'student_number' => 'required|unique:interns',
        ]);

        Intern::create($request->all());

        return redirect()
            ->route('interns.index')
            ->with('success', 'Intern created successfully');
    }

    public function destroy(Intern $intern)
    {
        $intern->delete();

        return redirect()
            ->route('interns.index')
            ->with('success', 'Intern deleted successfully');
    }
}
