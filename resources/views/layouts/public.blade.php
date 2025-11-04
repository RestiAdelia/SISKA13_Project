<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .navbar-brand {
            font-family: 'figtree', sans-serif;
            font-weight: 800;
            font-size: 1.75rem;
            letter-spacing: -0.02em;
        }

        .navbar-link {
            font-weight: 600;
            letter-spacing: 0em;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <!-- Navigation -->
        <nav class="border-b border-gray-700" style="background-color: #560029;">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <a href="{{ route('landing') }}" class="navbar-brand text-white">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>
                    <div class="flex items-center space-x-4">
                        @auth
                            <a href="{{ route('dashboard') }}"
                                class="navbar-link text-white hover:text-gray-200">Dashboard</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        @hasSection('header')
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    @yield('header')
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>
