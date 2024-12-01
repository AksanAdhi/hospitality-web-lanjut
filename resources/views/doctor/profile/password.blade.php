<x-layout>
    <x-slot:title></x-slot:title>

    <div class="container mx-auto">
        <!-- Tombol Kembali -->
        <div class="mb-6">
            <a href="{{ route('doctor.profile.edit') }}" 
               class="inline-flex items-center text-blue-500 hover:underline">
                ← Back to Edit Profile
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('doctor.password.update') }}" method="POST" class="bg-white p-6 rounded shadow-md max-w-lg mx-auto">
            @csrf

            <div class="mb-4">
                <label for="current_password" class="block text-gray-700 font-medium">Current Password</label>
                <input type="password" id="current_password" name="current_password" 
                       class="w-full mt-2 p-2 border rounded @error('current_password') border-red-500 @enderror">
                @error('current_password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="new_password" class="block text-gray-700 font-medium">New Password</label>
                <input type="password" id="new_password" name="new_password" 
                       class="w-full mt-2 p-2 border rounded @error('new_password') border-red-500 @enderror">
                @error('new_password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="new_password_confirmation" class="block text-gray-700 font-medium">Confirm New Password</label>
                <input type="password" id="new_password_confirmation" name="new_password_confirmation" 
                       class="w-full mt-2 p-2 border rounded">
            </div>

            <div class="mt-6">
                <button type="submit" class="w-full bg-red-500 text-white font-semibold py-2 rounded shadow hover:bg-red-600">
                    Update Password
                </button>
            </div>
        </form>
    </div>
</x-layout>
