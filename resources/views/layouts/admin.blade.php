<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>
        Intern Management Portal
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body class="bg-slate-50 text-slate-900">

<div class="flex h-screen overflow-hidden">

    {{-- SIDEBAR --}}

    @include('layouts.sidebar')


    <div class="flex flex-col flex-1">

        @include('layouts.navigation')


        <main class="p-8 overflow-y-auto">

            @yield('content')

        </main>

    </div>

</div>

</body>

</html>