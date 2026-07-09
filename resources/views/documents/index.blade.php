@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto p-6">

    @if(session('success'))
        <div class="mb-6 rounded-lg bg-green-100 text-green-700 p-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                Document Management
            </h1>

            <p class="text-gray-500">
                Upload and manage internship documents
            </p>
        </div>

        <a href="{{ route('documents.create') }}"
           class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-lg shadow">
            + Upload Document
        </a>
    </div>

    <div class="bg-white rounded-xl shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">

            <tr>

                <th class="text-left p-4">Title</th>

                <th class="text-left p-4">Type</th>

                <th class="text-left p-4">Uploaded By</th>

                <th class="text-left p-4">Status</th>

                <th class="text-left p-4">Action</th>

            </tr>

            </thead>

            <tbody>

            @forelse($documents as $document)

                <tr class="border-t hover:bg-gray-50">

                    <td class="p-4">

                        {{ $document->title }}

                    </td>

                    <td class="p-4">

                        {{ $document->type }}

                    </td>

                    <td class="p-4">

                        {{ $document->user->name }}

                    </td>

                    <td class="p-4">

                        @if($document->status=='Approved')

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">
                                Approved
                            </span>

                        @elseif($document->status=='Rejected')

                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">
                                Rejected
                            </span>

                        @else

                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">
                                Pending
                            </span>

                        @endif

                    </td>

                    <td class="p-4">

                        <a href="{{ route('documents.download',$document) }}"
                           class="text-indigo-600 hover:underline">
                            Download
                        </a>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center p-10 text-gray-500">

                        No documents uploaded.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection