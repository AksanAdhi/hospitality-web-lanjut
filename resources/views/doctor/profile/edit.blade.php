<x-layout>
    <x-slot:title>Edit Profile</x-slot:title>

    <div class="container mx-auto mt-10 max-w-lg">
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Foto Profil -->
        <div class="text-center mb-6">
            @if($user->profilePicture)
                <img src="{{ asset('uploads/profile_pictures/' . $user->profilePicture) }}" 
                     alt="Profile Picture" 
                     class="w-32 h-32 rounded-full mx-auto shadow-md">
            @else
                <img src="{{ asset('images/default-profile.png') }}" 
                     alt="Default Profile" 
                     class="w-32 h-32 rounded-full mx-auto shadow-md">
            @endif
            <h2 class="text-2xl font-semibold mt-4">{{ $user->name }}</h2>
            <p class="text-gray-600">{{ $user->email }}</p>
        </div>

        <!-- Form Edit Profile -->
        <form action="{{ route('doctor.profile.update') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
            @csrf

            <h2 class="text-xl font-semibold mb-4">Update Profile Information</h2>

            <div class="mb-4">
                <label for="username" class="block text-gray-700 font-medium">Username</label>
                <input type="text" id="username" name="username"
                       value="{{ old('username', $user->username) }}"
                       class="w-full mt-2 p-2 border rounded @error('username') border-red-500 @enderror">
                @error('username')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium">Name</label>
                <input type="text" id="name" name="name"
                       value="{{ old('name', $user->name) }}"
                       class="w-full mt-2 p-2 border rounded @error('name') border-red-500 @enderror">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input type="email" id="email" name="email"
                       value="{{ old('email', $user->email) }}"
                       class="w-full mt-2 p-2 border rounded @error('email') border-red-500 @enderror">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="profilePicture" class="block text-gray-700 font-medium">Profile Picture</label>
                <input type="file" id="profilePicture" name="profilePicture"
                       class="w-full mt-2 p-2 border rounded @error('profilePicture') border-red-500 @enderror">
                @error('profilePicture')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-6">
                <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-2 rounded shadow hover:bg-blue-600">
                    Update Profile
                </button>
            </div>
        </form>

        <!-- Link Ubah Password -->
        <div class="mt-6 text-center">
            <a href="{{ route('doctor.password.change') }}" class="text-blue-500 hover:underline">
                Change Password
            </a>
        </div>
    </div>
</x-layout>
