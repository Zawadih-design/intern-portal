<aside

x-show="sidebarOpen"

x-transition

class="w-72 bg-slate-900 text-white flex flex-col shadow-2xl fixed lg:static h-full z-50">


    <div class="h-28 flex flex-col items-center justify-center border-b border-slate-700">

        <div class="flex items-center gap-3">

            <img
            src="{{ asset('images/zesco-logo.png') }}"
            class="w-9 h-9 rounded-full object-cover"
            alt="ZESCO Logo">


            <h1 class="text-3xl font-black tracking-wider text-white">
                ZESCO
            </h1>

        </div>


        <div class="w-16 h-[2px] bg-green-600 mt-2 mb-1"></div>


        <p class="text-[10px] tracking-widest text-orange-400">
            INTERN MANAGEMENT SYSTEM
        </p>


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

    <div class="px-6 py-5 border-t border-slate-700">
        <div class="font-semibold text-white">
            {{ Auth::user()->name }}
        </div>
        <div class="text-sm text-slate-400">
            Administrator
        </div>
        <div class="mt-3 text-xs text-slate-500">
            © {{ date('Y') }} ZESCO PLC
        </div>
    </div>

</aside>