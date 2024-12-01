<!-- resources\views\admin\learn-more.blade.php -->
<x-layout>
    <x-slot:title>Pelajari Lebih Lanjut</x-slot:title>
    
    <!-- Header Section -->
    <div class="bg-blue-500 text-white p-10 rounded-lg shadow-lg">
        <div class="text-center">
            <h1 class="text-3xl font-bold">Pelajari Lebih Lanjut Tentang Sistem Manajemen Rumah Sakit</h1>
            <p class="mt-4 text-lg">Detail fitur dan manfaat untuk meningkatkan efisiensi pelayanan kesehatan.</p>
        </div>
    </div>

    <!-- Features Detail Section -->
    <div class="mt-10 max-w-5xl mx-auto space-y-8">
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-bold text-blue-500">1. Pengelolaan Pasien</h2>
            <p class="mt-2 text-gray-600">
                Fitur ini memungkinkan pengguna untuk mengelola data pasien, termasuk informasi pribadi, riwayat medis, 
                dan hasil pemeriksaan. Semua data terorganisasi dengan baik untuk mendukung pengambilan keputusan yang cepat dan tepat.
            </p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-bold text-blue-500">2. Jadwal Janji Temu</h2>
            <p class="mt-2 text-gray-600">
                Dokter dan staf dapat dengan mudah mengatur jadwal pertemuan dengan pasien. Fitur notifikasi membantu 
                memastikan setiap janji temu tidak terlewatkan.
            </p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-bold text-blue-500">3. Manajemen Obat</h2>
            <p class="mt-2 text-gray-600">
                Kelola stok obat dengan sistem inventaris yang terintegrasi. Fitur ini mencakup pengingat masa kedaluwarsa 
                obat untuk memastikan kualitas tetap terjaga.
            </p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-bold text-blue-500">4. Keamanan Data</h2>
            <p class="mt-2 text-gray-600">
                Data pasien dilindungi dengan teknologi enkripsi terbaru untuk menjaga kerahasiaan dan mencegah akses tidak sah.
            </p>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="text-center mt-12">
        <a href="{{ route('admin.home') }}" class="px-6 py-3 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600">
            Kembali ke Halaman Utama
        </a>
    </div>
</x-layout>
