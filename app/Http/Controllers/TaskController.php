<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Intern;
use App\Models\Supervisor;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'supervisor']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with([
            'intern.user',
            'supervisor.user'
        ])
        ->latest()
        ->get();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $interns = Intern::with('user')
            ->get();

        $supervisors = Supervisor::with('user')
            ->get();

        return view('tasks.create', compact(
            'interns',
            'supervisors'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'intern_id' => [
                'required',
                'exists:interns,id'
            ],

            'title' => [
                'required',
                'string',
                'min:5',
                'max:255'
            ],

            'description' => [
                'required',
                'string',
                'min:10'
            ],

            'priority' => [
                'required',
                'in:Low,Medium,High'
            ],

            'deadline' => [
                'required',
                'date',
                'after_or_equal:today'
            ]

        ], [

            'title.required' => 'Please enter a task title.',

            'title.min' => 'Task title must contain at least 5 characters.',

            'title.max' => 'Task title must not exceed 255 characters.',

            'description.required' => 'Please provide task details.',

            'description.min' => 'Description must contain at least 10 characters.',

            'priority.required' => 'Please select a priority level.',

            'priority.in' => 'Invalid priority selected. Choose Low, Medium, or High.',

            'deadline.required' => 'Please select a deadline.',

            'deadline.date' => 'Please enter a valid date.',

            'deadline.after_or_equal' => 'Deadline cannot be in the past.',

            'intern_id.required' => 'Please select an intern.',

            'intern_id.exists' => 'Selected intern does not exist.'

        ]);

        Task::create([
            'intern_id' => $validated['intern_id'],
            'supervisor_id' => auth()->user()->supervisor->id,
            'title' => $validated['title'],
            'description' => $validated['description'],
            'priority' => $validated['priority'],
            'deadline' => $validated['deadline'],
            'status' => 'Pending',
        ]);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}