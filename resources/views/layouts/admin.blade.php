<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel Admin') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gradient-to-r from-[#E9F1FA] via-[#A6C8FF] to-[#00ABE4] text-white min-h-screen">

        <nav class="bg-gradient-to-r from-[#E9F1FA] via-[#A6C8FF] to-[#00ABE4] p-4">
            <div class="flex justify-between items-center">

                <div class="flex-1">
                    <!-- You can add a logo or any other element on the left side -->
                </div>

                @auth
                    <div class="flex items-center space-x-4">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="text-white hover:text-gray-200">Logout</button>
                        </form>
                    </div>
                @endauth

                @guest
                    <div>
                        <a href="{{ route('login') }}" class="text-white hover:text-gray-200">Login</a>
                    </div>
                @endguest
            </div>
        </nav>

        <main class="container mx-auto py-12 px-4">
            @yield('content')
        </main>

    </body>
</html>
