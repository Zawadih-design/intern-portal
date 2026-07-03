<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Departments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-6">
                <a href="{{ route('departments.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    Create Department
                </a>
            </div>

            {{-- Success Message --}}
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-50 dark:bg-green-900 border border-green-200 dark:border-green-700 rounded-md">
                    <p class="text-sm text-green-600 dark:text-green-200">{{ session('success') }}</p>
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if($departments->count())

                        @foreach($departments as $department)

                            <div class="mb-6 pb-6 {{ !$loop->last ? 'border-b border-gray-200 dark:border-gray-700' : '' }}">

                                <div class="flex items-center justify-between">
                                    <h3 class="text-lg font-semibold">{{ $department->name }}</h3>
                                    <div class="flex gap-2">
                                        <a href="{{ route('departments.show', $department) }}" class="text-indigo-600 dark:text-indigo-400 hover:underline text-sm">View</a>
                                        <a href="{{ route('departments.edit', $department) }}" class="text-yellow-600 dark:text-yellow-400 hover:underline text-sm">Edit</a>
                                        <form method="POST" action="{{ route('departments.destroy', $department) }}" class="inline" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 dark:text-red-400 hover:underline text-sm">Delete</button>
                                        </form>
                                    </div>
                                </div>

                                <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $department->description ?: 'No description provided.' }}</p>

                            </div>

                        @endforeach

                    @else

                        <p class="text-gray-500 dark:text-gray-400">No departments found. Create one to get started.</p>

                    @endif

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
