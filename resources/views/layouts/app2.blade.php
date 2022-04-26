<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

    <div class="min-h-screen">

        <!-- <div class="col-span-2 border-r-2 border-slate-300"> -->

        <!-- </div> -->
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
