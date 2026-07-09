<?php

namespace App\Http\Controllers;

use App\Models\Intern;
use App\Models\Supervisor;
use App\Models\PerformanceReview;
use Illuminate\Http\Request;

class PerformanceReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'supervisor']);
    }

    /**
     * Display all reviews
     */
    public function index()
    {
        $reviews = PerformanceReview::with([
            'intern.user',
            'supervisor.user'
        ])
        ->latest()
        ->get();

        return view('performance.index', compact('reviews'));
    }

    /**
     * Show evaluation form
     */
    public function create()
    {
        $interns = Intern::with('user')->get();
        $supervisors = Supervisor::with('user')->get();

        return view('performance.create', compact(
            'interns',
            'supervisors'
        ));
    }

    /**
     * Save evaluation
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'intern_id' => [
                'required',
                'exists:interns,id'
            ],
            'supervisor_id' => [
                'required',
                'exists:supervisors,id'
            ],
            'technical_score' => [
                'required',
                'integer',
                'between:0,100'
            ],
            'communication_score' => [
                'required',
                'integer',
                'between:0,100'
            ],
            'teamwork_score' => [
                'required',
                'integer',
                'between:0,100'
            ],
            'problem_solving_score' => [
                'required',
                'integer',
                'between:0,100'
            ],
            'professionalism_score' => [
                'required',
                'integer',
                'between:0,100'
            ],
            'comments' => [
                'nullable',
                'string'
            ],
            'review_date' => [
                'required',
                'date'
            ]
        ]);

        $scores = [
            $validated['technical_score'],
            $validated['communication_score'],
            $validated['teamwork_score'],
            $validated['problem_solving_score'],
            $validated['professionalism_score']
        ];

        $validated['overall_score'] = PerformanceReview::calculateScore($scores);

        PerformanceReview::create($validated);

        return redirect()
            ->route('performance.index')
            ->with('success', 'Performance review submitted successfully');
    }
}