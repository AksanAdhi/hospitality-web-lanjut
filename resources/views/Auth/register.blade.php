<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-6 transition-transform transform hover:scale-105 duration-300">
        <h2 class="text-2xl font-semibold text-gray-800 text-center mb-4">Buat Akun</h2>

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

        <form action="{{ route('register') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
            @csrf
            <!-- Profile Picture Field -->
            <div>
                <label for="profilePicture" class="block text-gray-700 font-medium">Foto Profil</label>
                <input type="file" name="profilePicture" id="profilePicture"
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500">
            </div>

            <div>
                <label for="username" class="block text-gray-700 font-medium">Username</label>
                <input type="text" name="username" id="username" required
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500 transition duration-200 hover:border-gray-400">
            </div>
            <div>
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input type="email" name="email" id="email" required
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500 transition duration-200 hover:border-gray-400">
            </div>
            <div>
                <label for="password" class="block text-gray-700 font-medium">Password</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500 transition duration-200 hover:border-gray-400">
            </div>
            <div>
                <label for="password_confirmation" class="block text-gray-700 font-medium">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500 transition duration-200 hover:border-gray-400">
            </div>
            <button type="submit" class="w-full bg-green-400 text-white py-2 rounded hover:bg-green-600 transition-all duration-300 transform hover:scale-105">
                Buat Akun
            </button>
            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
            @endif

        </form>
    </div>
</body>

</html>