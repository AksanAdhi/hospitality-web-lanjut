<!-- resources\views\doctor\appointments\show.blade.php -->
<x-user-layout>
    <x-slot:title>Detail Janji Temu</x-slot:title>

    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4">Detail Janji Temu</h2>

        <div class="mb-6">
            <h3 class="text-xl font-semibold mb-2">Informasi Janji Temu</h3>
            <p><strong>Nama Pasien:</strong> {{ $appointment->patient->nama }}</p>
            <p><strong>Dokter:</strong> {{ $appointment->doctor->name }}</p>
            <p><strong>Tanggal Janji Temu:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d-m-Y') }}</p>
            <p><strong>Waktu:</strong> {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('H:i') }}</p>
        </div>

        <div class="mb-6">
            <h3 class="text-xl font-semibold mb-2">Catatan</h3>
            <p>{{ $appointment->notes ?? 'Tidak ada catatan.' }}</p>
        </div>

        <div class="mt-6">
            <a href="{{ route('doctor.appointments.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Kembali ke Daftar Janji Temu
            </a>
        </div>
    </div>
</x-user-layout>
