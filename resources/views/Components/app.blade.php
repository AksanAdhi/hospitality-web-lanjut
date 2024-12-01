<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Application' }}</title>
    @vite('resources/css/app.css') <!-- Sesuaikan jika menggunakan asset lain -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
</head>

<body class="h-full">
    <div id="app">
        <!-- Navbar -->
        <nav class="bg-blue-100" x-data="{ isOpen: false }">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-auto">
                            <img class="h-14 w-auto" src="{{ asset('images/Logo.png') }}" alt="Logo">
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <!-- Link navigasi untuk guest -->
                            <a href="/" class="{{ request()->is('/') ? 'bg-white text-gray-800' : 'bg-blue-100 text-gray-800 hover:bg-white hover:text-gray-800' }} rounded-md px-3 py-2 text-sm font-medium">Home</a>
                            <a href="/about" class="{{ request()->is('about') ? 'bg-white text-gray-800' : 'bg-blue-100 text-gray-800 hover:bg-white hover:text-gray-800' }} rounded-md px-3 py-2 text-sm font-medium">About</a>
                            <a href="/contact" class="{{ request()->is('contact') ? 'bg-white text-gray-800' : 'bg-blue-100 text-gray-800 hover:bg-white hover:text-gray-800' }} rounded-md px-3 py-2 text-sm font-medium">Contact</a>
                        </div>
                    </div>

                    <!-- Tombol Login dan Sign Up hanya untuk guest -->
                    <div class="ml-4 flex items-center space-x-4">
                        @guest
                        <a href="{{ route('login') }}" class="text-gray-800 hover:text-blue-500 font-medium">Login</a>
                        <a href="{{ route('register') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg font-medium hover:bg-blue-600">Sign Up</a>
                        @endguest
                    </div>

                    <!-- Mobile menu button -->
                    <div class="-mr-2 flex md:hidden">
                        <button type="button" @click="isOpen = !isOpen"
                            class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-yellow-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <!-- Menu open: "hidden", Menu closed: "block" -->
                            <svg :class="{'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="md:hidden" id="mobile-menu" :class="{'block': isOpen, 'hidden': !isOpen}">
                <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                    <a href="/" class="block px-3 py-2 text-base font-medium text-gray-800 hover:bg-gray-700 hover:text-white">Home</a>
                    <a href="/about" class="block px-3 py-2 text-base font-medium text-gray-800 hover:bg-gray-700 hover:text-white">About</a>
                    <a href="/contact" class="block px-3 py-2 text-base font-medium text-gray-800 hover:bg-gray-700 hover:text-white">Contact</a>
                </div>
                <div class="border-t border-gray-700 pb-3 pt-4">
                    @guest
                    <div class="space-y-1 px-2">
                        <a href="{{ route('login') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Login</a>
                        <a href="{{ route('register') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign Up</a>
                    </div>
                    @endguest
                </div>
            </div>
        </nav>


        <!-- Page Content -->
        <main>
            <div class="py-10">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>

</html>