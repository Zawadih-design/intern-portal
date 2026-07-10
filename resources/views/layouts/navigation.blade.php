<header class="h-20 bg-white border-b flex flex-col shadow-sm">
    <div class="h-10 bg-slate-900 border-b border-slate-700"></div>
    <div class="flex-1 flex items-center justify-between px-8">
        <div>
            <input type="text" placeholder="Search..." class="w-96 rounded-xl border border-slate-300 bg-slate-50 px-5 py-3 focus:border-orange-500 focus:ring-2 focus:ring-orange-300">
        </div>

        <div class="flex items-center gap-6">
            <div class="relative">
                <button class="w-10 h-10 rounded-full bg-slate-100 hover:bg-slate-200 flex items-center justify-center">
                    🔔
                </button>
                <span class="absolute -top-1 -right-1 bg-orange-500 text-white rounded-full text-xs w-5 h-5 flex items-center justify-center">
                    3
                </span>
            </div>

            <div class="text-right">
                <div class="font-semibold text-slate-900">{{ Auth::user()->name }}</div>
                <div class="text-sm text-slate-500">Administrator</div>
            </div>
        </div>
    </div>
</header>