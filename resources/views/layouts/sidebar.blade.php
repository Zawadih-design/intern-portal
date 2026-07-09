<aside class="w-72 bg-slate-900 text-white flex flex-col shadow-2xl">

    <div class="h-20 flex items-center justify-center border-b border-slate-700">
        <div class="text-center">
            <h1 class="text-3xl font-black tracking-widest">
                ZESCO
            </h1>
            <p class="text-xs text-orange-400">
                INTERN MANAGEMENT SYSTEM
            </p>
        </div>
    </div>

    <nav class="flex-1 px-5 py-6 space-y-2">
        <a href="{{ route('dashboard') }}"
           class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('dashboard') ? 'bg-orange-500 text-white' : 'hover:bg-slate-800 transition' }}">
            <x-icons.dashboard />
            <span>Dashboard</span>
        </a>

        <a href="{{ route('interns.index') }}"
           class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('interns.*') ? 'bg-orange-500 text-white' : 'hover:bg-slate-800 transition' }}">
            <x-icons.users />
            <span>Interns</span>
        </a>

        <a href="{{ route('departments.index') }}"
           class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('departments.*') ? 'bg-orange-500 text-white' : 'hover:bg-slate-800 transition' }}">
            <x-icons.building />
            <span>Departments</span>
        </a>

        <a href="{{ route('universities.index') }}"
           class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('universities.*') ? 'bg-orange-500 text-white' : 'hover:bg-slate-800 transition' }}">
            <x-icons.academic />
            <span>Universities</span>
        </a>

        <a href="{{ route('supervisors.index') }}"
           class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('supervisors.*') ? 'bg-orange-500 text-white' : 'hover:bg-slate-800 transition' }}">
            <x-icons.users />
            <span>Supervisors</span>
        </a>

        <a href="{{ route('tasks.index') }}"
           class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('tasks.*') ? 'bg-orange-500 text-white' : 'hover:bg-slate-800 transition' }}">
            <x-icons.task />
            <span>Tasks</span>
        </a>

        <a href="{{ route('attendance.index') }}"
           class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('attendance.*') ? 'bg-orange-500 text-white' : 'hover:bg-slate-800 transition' }}">
            <x-icons.calendar />
            <span>Attendance</span>
        </a>

        <a href="{{ route('performance.index') }}"
           class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('performance.*') ? 'bg-orange-500 text-white' : 'hover:bg-slate-800 transition' }}">
            <x-icons.chart />
            <span>Performance</span>
        </a>

        <a href="{{ route('documents.index') }}"
           class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('documents.*') ? 'bg-orange-500 text-white' : 'hover:bg-slate-800 transition' }}">
            <x-icons.document />
            <span>Documents</span>
        </a>

        <a href="{{ route('reports.index') }}"
           class="flex items-center gap-4 px-4 py-3 rounded-xl {{ request()->routeIs('reports.*') ? 'bg-orange-500 text-white' : 'hover:bg-slate-800 transition' }}">
            <x-icons.report />
            <span>Reports</span>
        </a>
    </nav>

    <div class="p-5 border-t border-slate-700">
        <div class="text-sm">{{ Auth::user()->name }}</div>
        <div class="text-xs text-slate-400">Administrator</div>
    </div>

</aside>