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
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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

        <!-- Page Content -->
        <main class="min-h-screen">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-8">
            <div class="container mx-auto px-6">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Scenic Bus Adventures</h3>
                        <p>Discover the beauty of travel with our comfortable buses and scenic routes.</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                        <ul>
                            <li><a href="{{ route('welcome') }}" class="hover:text-blue-400">Home</a></li>
                            <li><a href="{{ route('about') }}" class="hover:text-blue-400">About Us</a></li>
                            <li><a href="{{ route('contact') }}" class="hover:text-blue-400">Contact</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Contact Us</h3>
                        <p>123 Adventure Road</p>
                        <p>Tourville, TB 12345</p>
                        <p>Phone: (555) 123-4567</p>
                        <p>Email: info@scenicbusadventures.com</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Follow Us</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="hover:text-blue-400">Facebook</a>
                            <a href="#" class="hover:text-blue-400">Twitter</a>
                            <a href="#" class="hover:text-blue-400">Instagram</a>
                        </div>
                    </div>
                </div>
                <div class="mt-8 text-center">
                    <p>&copy; {{ date('Y') }} Scenic Bus Adventures. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>

