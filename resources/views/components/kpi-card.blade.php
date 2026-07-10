<div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 border border-slate-200 p-6 w-full">

    <div class="flex {{ $slot->isNotEmpty() ? 'justify-between' : 'justify-center' }} items-center">

        <div>

            <p class="text-slate-500 text-sm uppercase tracking-wide">

                {{ $title }}

            </p>

            <h2 class="text-4xl font-bold text-slate-900 mt-2">

                {{ $value }}

            </h2>

        </div>

        @if($slot->isNotEmpty())
        <div class="w-16 h-16 rounded-2xl bg-orange-100 flex items-center justify-center">

            {{ $slot }}

        </div>
        @endif

    </div>

</div>