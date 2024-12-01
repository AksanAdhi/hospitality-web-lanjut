<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Application</title>
    @vite('resources/css/app.css')
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
                            <a href="/" class="bg-white text-gray-800 rounded-md px-3 py-2 text-sm font-medium">Home</a>
                            <a href="/about" class="bg-blue-100 text-gray-800 hover:bg-white hover:text-gray-800 rounded-md px-3 py-2 text-sm font-medium">About</a>
                            <a href="/contact" class="bg-blue-100 text-gray-800 hover:bg-white hover:text-gray-800 rounded-md px-3 py-2 text-sm font-medium">Contact</a>
                        </div>
                    </div>
                    <div class="ml-4 flex items-center space-x-4">
                        @guest
                        <a href="{{ route('login') }}" class="text-gray-800 hover:text-blue-500 font-medium">Login</a>
                        <a href="{{ route('register') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg font-medium hover:bg-blue-600">Sign Up</a>
                        @endguest
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <button type="button" @click="isOpen = !isOpen" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-yellow-300 hover:text-white focus:outline-none">
                            <svg :class="{'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <header class="bg-blue-500 text-white">
            <div class="container mx-auto px-6 py-16 text-center">
                <h1 class="text-4xl font-bold mb-4">Selamat Datang di Aplikasi Kami</h1>
                <p class="text-lg mb-8">Jelajahi fitur canggih dan antarmuka yang mudah digunakan untuk meningkatkan pengalaman Anda.</p>
                <div class="flex justify-center space-x-4">
                    <a href="{{ route('register') }}" class="bg-yellow-400 text-blue-800 px-6 py-3 rounded-lg font-medium hover:bg-yellow-500">Mulai Sekarang</a>
                    <a href="{{ route('admin.learn-more') }}" class="bg-transparent border-2 border-white text-white px-6 py-3 rounded-lg font-medium hover:bg-white hover:text-blue-800">Pelajari Lebih Lanjut</a>
                </div>
            </div>
        </header>
        <!-- Functions Section -->
        <section class="py-8 bg-white">
            <div class="container mx-auto px-6">
                <h2 class="text-2xl font-bold text-center mb-6">Fungsi Sistem</h2>
                <div class="space-y-6">
                    <div class="bg-gray-100 p-6 rounded-lg shadow">
                        <h3 class="text-xl font-medium text-blue-500">Untuk Pengguna</h3>
                        <ul class="list-disc list-inside text-gray-600 mt-2">
                            <li>Kelola data pribadi dan lihat riwayat medis secara aman.</li>
                            <li>Jadwalkan dan lihat janji temu dengan dokter.</li>
                            <li>Terima pengingat dan pembaruan tentang janji temu dan resep.</li>
                        </ul>
                    </div>
                    <div class="bg-gray-100 p-6 rounded-lg shadow">
                        <h3 class="text-xl font-medium text-blue-500">Untuk Admin</h3>
                        <ul class="list-disc list-inside text-gray-600 mt-2">
                            <li>Kelola data pasien, jadwal dokter, dan inventaris secara efisien.</li>
                            <li>Awasi janji temu dan pastikan kelancaran operasional.</li>
                            <li>Jaga keamanan sistem dan peran pengguna secara efektif.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-blue-100 py-6">
            <div class="container mx-auto text-center text-gray-600">
                <p>&copy; 2024 Application. All rights reserved.</p>
            </div>
        </footer>
    </div>
</body>

</html>