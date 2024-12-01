<x-layout>
    <x-slot:title>Tentang Sistem</x-slot:title>

    
    <div class="p-10 bg-gray-100 min-h-screen">
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-6">
            <h1 class="text-3xl font-bold text-blue-500 mb-4">Tentang Sistem Manajemen Rumah Sakit</h1>
            <p class="text-gray-700 leading-relaxed">
                Sistem Manajemen Rumah Sakit ini dirancang untuk meningkatkan efisiensi pengelolaan layanan kesehatan. 
                Dengan fitur-fitur yang canggih, sistem ini memberikan solusi lengkap untuk mempermudah manajemen 
                data pasien, janji temu, obat-obatan, dan laporan.
            </p>
            <h2 class="text-2xl font-semibold text-blue-400 mt-6">Fitur Utama</h2>
            <ul class="list-disc list-inside mt-4 text-gray-700">
                <li>Pengelolaan pasien yang cepat dan akurat.</li>
                <li>Penjadwalan janji temu dengan dokter.</li>
                <li>Manajemen stok obat</li>
                <li>Antarmuka yang ramah pengguna.</li>
            </ul>
            <h2 class="text-2xl font-semibold text-blue-400 mt-6">Tujuan</h2>
            <p class="mt-4 text-gray-700">
                Kami berkomitmen untuk menyediakan solusi digital yang memudahkan rumah sakit dalam memberikan layanan terbaik kepada pasien, 
                sekaligus meningkatkan akurasi dan keamanan data.
            </p>
            <div class="mt-8 text-center">
                <a href="{{ route('admin.home') }}" class="px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow hover:bg-blue-600">
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</x-layout>
