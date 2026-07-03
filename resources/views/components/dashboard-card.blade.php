<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition">

    <div class="flex items-center justify-between">

        <div>
            <p class="text-sm text-gray-500 font-medium">
                {{ $title }}
            </p>

            <h2 class="text-3xl font-bold text-gray-800 mt-2">
                {{ number_format($value) }}
            </h2>
        </div>

        <div class="w-12 h-12 rounded-lg bg-blue-50 flex items-center justify-center">
            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 4v16m8-8H4" />
            </svg>
        </div>

    </div>

</div>