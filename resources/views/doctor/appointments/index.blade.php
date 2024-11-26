<!-- resources\views\doctor\appointments\index.blade.php -->
<x-user-layout>
    <x-slot:title>Janji Temu</x-slot:title>

    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4">Daftar Janji Temu</h2>

        <!-- Tabel Janji Temu -->
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300">
                <thead class="bg-blue-100">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">#</th>
                        <th class="border border-gray-300 px-4 py-2">Nama Pasien</th>
                        <th class="border border-gray-300 px-4 py-2">Tanggal</th>
                        <th class="border border-gray-300 px-4 py-2">Waktu</th>
                        <th class="border border-gray-300 px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                    <tr class="bg-white hover:bg-gray-50">
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $loop->iteration }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $appointment->patient->nama }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d-m-Y') }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('H:i') }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <a href="{{ route('doctor.appointments.show', $appointment->id) }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded">
                                Lihat
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    @if($appointments->isEmpty())
                    <tr>
                        <td colspan="5" class="border border-gray-300 px-4 py-2 text-center">Tidak ada janji temu yang tersedia.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-user-layout>