<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospitality</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<header class="bg-white text-black fixed w-full top-0 z-50">
  <div class="container mx-auto px-4 flex justify-between items-center py-4">
    <div class="flex items-center">
      <img class="h-10 w-auto mr-3" src="{{ asset('images/Logo.png') }}" alt="Logo">
      <span class="text-lg font-bold">Hospitality</span>
    </div>
    <nav>
      <ul class="flex space-x-6">
        @if (Route::has('login'))
          @auth
            <li><a href="{{ url('/home') }}" class="text-white hover:text-gray-500">Home</a></li>
          @else
            <li><a href="{{ route('login') }}" class="text-gray-800 hover:text-gray-500">Login</a></li>
            @if (Route::has('register'))
              <li><a href="{{ route('register') }}" class="text-gray-800 hover:text-gray-500">Register</a></li>
            @endif
          @endauth
        @endif
      </ul>
    </nav>
  </div>
</header>


<main>
  <section id="home" class="bg-blue-100 py-20">
    <div class="container mx-auto px-4 flex flex-col md:flex-row items-center">
      <div class="md:w-1/2">
        <h1 class="text-4xl font-bold text-gray-800 mb-6">The Best Medical Services</h1>
        <p class="text-gray-600 mb-6">Dedikasi Kami untuk Merawat dengan Kasih, Mengutamakan Kesehatan, dan Mewujudkan Kesembuhan dalam Setiap Langkah Perjalanan Anda.</p>
      </div>
      <div class="md:w-1/2">
      <img src="{{ asset('images/Logo.png') }}" alt="Logo">
      </div>
    </div>
  </section>
</main>
