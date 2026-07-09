@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto p-6">

    <div class="bg-white shadow rounded-xl p-8">

        <h1 class="text-2xl font-bold mb-6">
            Evaluate Intern
        </h1>

        <form method="POST" action="{{ route('performance.store') }}">

            @csrf

            <label class="block mb-2">
                Intern
            </label>

            <select name="intern_id" class="w-full border rounded p-3 mb-5">

                @foreach($interns as $intern)

                <option value="{{ $intern->id }}">

                    {{ $intern->user->name ?? 'No user linked' }}

                </option>

                @endforeach

            </select>

            <label class="block mb-2">
                Supervisor
            </label>

            <select name="supervisor_id" class="w-full border rounded p-3 mb-5">

                @foreach($supervisors as $supervisor)

                <option value="{{ $supervisor->id }}">

                    {{ $supervisor->user->name ?? 'No user linked' }}

                </option>

                @endforeach

            </select>

            @foreach([
            'technical_score'=>'Technical Skills',
            'communication_score'=>'Communication',
            'teamwork_score'=>'Teamwork',
            'problem_solving_score'=>'Problem Solving',
            'professionalism_score'=>'Professionalism'
            ] as $field=>$label)

            <label class="block mb-2">
                {{ $label }} (0-100)
            </label>

            <input type="number"
            name="{{ $field }}"
            min="0"
            max="100"
            class="w-full border rounded p-3 mb-5">

            @endforeach

            <label class="block mb-2">
                Review Date
            </label>

            <input type="date"
            name="review_date"
            value="{{ date('Y-m-d') }}"
            class="w-full border rounded p-3 mb-5">

            <label class="block mb-2">
                Comments
            </label>

            <textarea
            name="comments"
            rows="4"
            class="w-full border rounded p-3 mb-5"></textarea>

            <button
            class="bg-blue-600 text-white px-6 py-3 rounded-lg">

                Submit Evaluation

            </button>

        </form>

    </div>

</div>

@endsection