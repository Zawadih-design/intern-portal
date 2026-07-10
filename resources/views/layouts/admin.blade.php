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

<body 
x-data="{sidebarOpen:true}"
class="bg-slate-100">

<div class="flex h-screen overflow-hidden">

    {{-- SIDEBAR --}}

    @include('layouts.sidebar')


    <div class="flex flex-col flex-1 min-w-0">

        @include('layouts.navigation')


        <main class="flex-1 p-8 overflow-y-auto w-full">

            @yield('content')

        </main>

    </div>

</div>

</body>

</html>