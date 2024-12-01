<x-user-layout>
    <x-slot:title></x-slot:title>

    <div class=" bg-gray-100 flex flex-col justify-center items-center py-1">
        <!-- Hero Section -->
        <div class="bg-blue-500 text-white rounded-lg shadow-lg w-full max-w-4xl p-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold">Selamat Datang, {{ auth()->user()->username }}</h1>
                <p class="mt-4 text-lg">
                    Sistem Manajemen Rumah Sakit yang dirancang untuk membantu Anda mengelola data pasien dan janji temu dengan mudah dan efisien.
                </p>
            </div>
        </div>

        <!-- Features Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-10 w-full max-w-6xl">
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h2 class="text-blue-500 text-lg font-semibold">Pengelolaan Pasien</h2>
                <p class="mt-2 text-gray-600">
                    Mudahkan akses data pasien, termasuk riwayat medis dan informasi penting lainnya.
                </p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h2 class="text-blue-500 text-lg font-semibold">Janji Temu</h2>
                <p class="mt-2 text-gray-600">
                    Atur jadwal janji temu pasien dengan sistem yang efisien dan terorganisir.
                </p>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="mt-12 text-center">
            <a href="{{ route('doctor.patients.index') }}" class="px-6 py-3 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600">
                Lihat Data Pasien
            </a>
            <a href="{{ route('doctor.appointments.index') }}" class="ml-4 px-6 py-3 bg-gray-300 text-blue-500 rounded-lg shadow hover:bg-gray-400">
                Lihat Janji Temu
            </a>
        </div>
    </div>
</x-user-layout>
