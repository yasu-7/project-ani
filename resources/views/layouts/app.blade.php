<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        
        @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/star.css'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
            
            <div class = "flex">
            
            @if (isset($sub1))
                <div class = "flex-none w-72 max-h-max">{{ $sub1 }}</div>
            @endif
            <!-- Page Content -->
            <div class = "flex-none w-7/12 max-h-max bg-white">
                <main>
                        {{ $slot }}
                </main>
             </div>
             
            @if (isset($sub2))
                {{ $sub2 }}
            @endif
            
            </div>
        </div>
    </body>
</html>
