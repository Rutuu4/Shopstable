<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@100;200;300;400;500;600;700&family=IBM+Plex+Sans:wght@100;200;300;400;500;600;700&family=Inter:wght@100;200;300;400&family=Mochiy+Pop+P+One&family=Poppins:wght@100;200;300;400;500;600;700&family=Quicksand:wght@300;400&display=swap"
        rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

    </style>

    <!-- Styles -->
    {{-- <link rel="stylesheet" href="/css/app.css"> --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/@tailwindcss/forms@0.2.1/dist/forms.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="/js/app.js" defer></script>
    <script src="/js/webBuilder.js" defer></script>

</head>

<body class="font-sans antialiased">
    <!-- Page Heading -->
    <header class="bg-white border-b-2 border-slate-300 shadow">

        <div class="mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{-- {{ $header }} --}}
            @include('layouts.header')
        </div>
    </header>

    <div class="grid grid-cols-10 min-h-screen bg-gray-100">

        <div class="col-span-2 border-r-2 border-slate-300">
            @include('layouts.sidebar')
        </div>
        <div class="col-span-8">
            {{-- @include('layouts.navigation') --}}
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>
