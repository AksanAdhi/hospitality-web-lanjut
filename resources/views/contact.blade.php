<!-- Contact Page -->
<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Application</title>
    @vite('resources/css/app.css')
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
                            <a href="/" class="text-gray-800 rounded-md px-3 py-2 text-sm font-medium">Home</a>
                            <a href="/about" class="bg-blue-100 text-gray-800 hover:bg-white hover:text-gray-800 rounded-md px-3 py-2 text-sm font-medium">About</a>
                            <a href="/contact" class="bg-white text-gray-800 rounded-md px-3 py-2 text-sm font-medium">Contact</a>
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

        <!-- Contact Section -->
        <section class="py-16 bg-gray-100">
            <div class="container mx-auto px-6">
                <h1 class="text-4xl font-bold text-center mb-4">Hubungi Kami</h1>
                <p class="text-lg text-gray-600 text-center mb-8">Kami siap membantu Anda. Jangan ragu untuk menghubungi kami melalui form berikut:</p>
                <form action="/contact/submit" method="POST" class="max-w-xl mx-auto bg-white p-6 shadow rounded-lg">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">Nama</label>
                        <input type="text" id="name" name="name" class="w-full mt-2 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">Email</label>
                        <input type="email" id="email" name="email" class="w-full mt-2 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-gray-700">Pesan</label>
                        <textarea id="message" name="message" rows="5" class="w-full mt-2 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                    </div>
                    <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Kirim</button>
                </form>
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