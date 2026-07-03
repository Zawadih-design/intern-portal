<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function index()
    {
        $universities = University::all();
        return view('universities.index', compact('universities'));
    }

    public function create()
    {
        return view('universities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:universities',
            'country' => 'nullable',
            'city' => 'nullable',
            'website' => 'nullable'
        ]);

        University::create($request->all());

        return redirect()
            ->route('universities.index')
            ->with('success', 'University created successfully');
    }

    public function destroy(University $university)
    {
        $university->delete();

        return redirect()
            ->route('universities.index')
            ->with('success', 'University deleted successfully');
    }
}