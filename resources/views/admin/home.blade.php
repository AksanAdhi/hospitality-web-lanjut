<!-- resources\views\admin\home.blade.php -->
<x-layout>
    <x-slot:title></x-slot:title>
    
    <!-- Hero Section -->
    <div class="bg-blue-500 text-white p-10 rounded-lg shadow-lg">
        <div class="text-center">
            <h1 class="text-3xl font-bold">Selamat Datang di Sistem Manajemen Rumah Sakit</h1>
            <p class="mt-4 text-lg">Meningkatkan efisiensi dan kemudahan dalam pengelolaan layanan kesehatan.</p>
            <a href="{{route('admin.learn-more')}}" class="mt-6 inline-block px-6 py-2 bg-white text-blue-500 font-semibold rounded-lg shadow hover:bg-blue-100">
                Pelajari Lebih Lanjut
            </a>
        </div>
    </div>

    <!-- Features Section -->
    <div id="features" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-10">
        <div class="p-4 bg-white rounded-lg shadow">
            <h2 class="text-lg font-semibold text-blue-500">Pengelolaan Pasien</h2>
            <p class="mt-2 text-gray-600">Lacak data pasien secara cepat dan akurat, termasuk riwayat medis mereka.</p>
        </div>
        <div class="p-4 bg-white rounded-lg shadow">
            <h2 class="text-lg font-semibold text-blue-500">Janji Temu</h2>
            <p class="mt-2 text-gray-600">Atur jadwal janji temu dengan dokter secara efisien.</p>
        </div>
        <div class="p-4 bg-white rounded-lg shadow">
            <h2 class="text-lg font-semibold text-blue-500">Manajemen Obat</h2>
            <p class="mt-2 text-gray-600">Pantau stok obat dan masa kedaluwarsa dengan sistem yang terintegrasi.</p>
        </div>
        <div class="p-4 bg-white rounded-lg shadow">
            <h2 class="text-lg font-semibold text-blue-500">User-Friendly Interface</h2>
            <p class="mt-2 text-gray-600">Antarmuka yang mudah digunakan, cocok untuk semua pengguna.</p>
        </div>
        <div class="p-4 bg-white rounded-lg shadow">
            <h2 class="text-lg font-semibold text-blue-500">Keamanan Data</h2>
            <p class="mt-2 text-gray-600">Data Anda dijamin aman dengan sistem keamanan yang canggih.</p>
        </div>
    </div>
</x-layout>
