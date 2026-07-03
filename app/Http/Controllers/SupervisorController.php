<?php

namespace App\Http\Controllers;

use App\Models\Supervisor;
use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;

class SupervisorController extends Controller
{
    public function index()
    {
        $supervisors = Supervisor::with(['user', 'department'])->get();
        return view('supervisors.index', compact('supervisors'));
    }

    public function create()
    {
        $users = User::all();
        $departments = Department::all();

        return view('supervisors.create', compact('users', 'departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'department_id' => 'required|exists:departments,id',
            'position' => 'nullable',
            'phone' => 'nullable',
        ]);

        Supervisor::create($request->all());

        return redirect()
            ->route('supervisors.index')
            ->with('success', 'Supervisor created successfully');
    }

    public function destroy(Supervisor $supervisor)
    {
        $supervisor->delete();

        return redirect()
            ->route('supervisors.index')
            ->with('success', 'Supervisor deleted successfully');
    }
}