<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'E-SPORT') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#C9193A]  dark:bg-gray-900">
            <div class="absolute inset-0 z-0">
                <img src="{{ url('img/Bg.png')}}" alt="" class="w-full h-full">
            </div>
            <div>
            <div class="relative">
                    <div class="w-full">
                        <img src="{{ url('img/b2.png')}}" alt="" class="filter blur-sm">
                    </div>
                <div class="absolute right-1/4 top-1/2 transform translate-x-1/3 -translate-y-1/2 w-full sm:max-w-md">
                    <div class="mt-6 px-6 py-4 bg-[#01142E] dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg bg-[rgba(0,0,0,0.7)]">
                        {{ $slot }}
                    </div>
                </div>
                <div class="absolute top-1/2 -translate-x-1/2 -translate-y-1/2 -left-1 w-full sm:max-w-md">
                    <div class="w-full">
                        <img src="{{ url('img/character_logo.png')}}" alt="" >
                    </div>
                </div>
            </div>
            </div>
        </div>
    </body>
</html>
