<!-- resources/views/doctor/patients/index.blade.php -->
<x-user-layout>
    <x-slot:title>Data Pasien</x-slot:title>

    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4">Daftar Pasien</h2>

        <!-- Tabel Pasien -->
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300">
                <thead class="bg-blue-100">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">ID</th>
                        <th class="border border-gray-300 px-4 py-2">Nama</th>
                        <th class="border border-gray-300 px-4 py-2">NIK</th>
                        <th class="border border-gray-300 px-4 py-2">Jenis Kelamin</th>
                        <th class="border border-gray-300 px-4 py-2">Tanggal Lahir</th>
                        <th class="border border-gray-300 px-4 py-2">Telepon</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($patients as $patient)
                    <tr class="bg-white hover:bg-gray-50">
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $loop->iteration }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $patient->nama }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $patient->nik }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $patient->jenis_kelamin }}</td>
                        <td class="border border-gray-300 px-4 py-2"> {{ \Carbon\Carbon::parse($patient->tanggal_lahir)->format('d-m-Y') }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $patient->telepon }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="border border-gray-300 px-4 py-2 text-center">Tidak ada data pasien.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-user-layout>
