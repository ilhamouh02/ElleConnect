<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts 
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />-->

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans antialiased h-full">
        <div class="min-h-full">
            <div class="bg-indigo-600 pb-32">
                @include('layouts.navigation')

                <header class="py-10">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        @yield('header')
                    </div>
                </header>
            </div>

            <main class="-mt-32">
                <div class="max-w-7xl mx-auto pb-12 px-4 sm:px-6 lg:px-8">
                    <div class="bg-white rounded-lg shadow">
                        <div class="flex">
                            @include('includes.menu')
                            <div class="flex-1 p-6">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
