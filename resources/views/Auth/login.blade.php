<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-blue-300 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white rounded-lg shadow p-6">
        <img class=" h-32 w-auto mx-auto flex" src="{{asset('images/logo.png')}}" alt="Logo">
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-4">Hospitality</h2>
        <p class="text-center text-gray-500 mb-4 text-sm">Masukkan Username dan Password</p>

        <!-- Error Message -->
        @if($errors->any())
            <div class="mb-4 text-red-500 text-sm">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Form Login -->
        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf
            <!-- Field Username -->
            <div>
                <label for="username" class="block text-gray-700 font-medium">Username</label>
                <input type="text" name="username" id="username" required
                       class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500">
            </div>
            <!-- Field Password -->
            <div>
                <label for="password" class="block text-gray-700 font-medium">Password</label>
                <input type="password" name="password" id="password" required
                       class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500">
            </div>
            <!-- Submit Button -->
            <button type="submit" class="w-full bg-green-400 text-white py-2 rounded-lg hover:bg-green-600 transition duration-200">
                Login
            </button>
        </form>
        <!-- Redirect ke register -->
        <div class="text-center mt-4">
            <span class="text-gray-600">Tidak punya akun?</span>
            <a href="{{route('register')}}" class="text-gray-800 hover:underline">Daftar disini!</a>
        </div>
    </div>
</body>
</html>
