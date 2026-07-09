<aside class="w-64 bg-slate-800 text-white min-h-screen">

    <div class="p-6 text-xl font-bold border-b border-slate-700">
        Intern Portal
    </div>

    <nav class="mt-4">

        <a href="{{ route('dashboard') }}"
           class="block px-6 py-3 hover:bg-slate-700">
            Dashboard
        </a>
        
<a href="{{ route('documents.index') }}">
    Documents
</a>
        <a href="{{ route('performance.index') }}"
           class="block px-6 py-3 hover:bg-slate-700">
            Performance
        </a>

        <a href="{{ route('interns.index') }}"
           class="block px-6 py-3 hover:bg-slate-700">
            Interns
        </a>

        <a href="{{ route('departments.index') }}"
           class="block px-6 py-3 hover:bg-slate-700">
            Departments
        </a>

        <a href="{{ route('universities.index') }}"
           class="block px-6 py-3 hover:bg-slate-700">
            Universities
        </a>

        <a href="{{ route('supervisors.index') }}"
           class="block px-6 py-3 hover:bg-slate-700">
            Supervisors
        </a>

        <a href="{{ route('tasks.index') }}"
           class="block px-6 py-3 hover:bg-slate-700">
            Tasks
        </a>

        <a href="{{ route('attendance.index') }}"
           class="block px-6 py-3 hover:bg-slate-700">
            Attendance
        </a>

    </nav>

</aside>