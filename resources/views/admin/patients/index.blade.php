<!-- resources/views/admin/patients/index.blade.php -->
<x-layout>
    <x-slot:title>Daftar Pasien</x-slot:title>

    <div class="mb-4">
        <a href="{{ route('patients.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Pasien</a>
    </div>

    <table class="min-w-full table-auto border-collapse">
        <thead>
            <tr>
                <th class="px-4 py-2 border-b">Nama</th>
                <th class="px-4 py-2 border-b">NIK</th>
                <th class="px-4 py-2 border-b">Jenis Kelamin</th>
                <th class="px-4 py-2 border-b">Tanggal Lahir</th>
                <th class="px-4 py-2 border-b">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patients as $patient)
            <tr>
                <td class="px-4 py-2 border-b">{{ $patient->nama }}</td>
                <td class="px-4 py-2 border-b">{{ $patient->nik }}</td>
                <td class="px-4 py-2 border-b">{{ $patient->jenis_kelamin }}</td>
                <td class="px-4 py-2 border-b">{{ $patient->tanggal_lahir }}</td>
                <td class="px-4 py-2 border-b">
                    <a href="{{ route('patients.edit', $patient->id) }}" class="text-yellow-500">Edit</a> | 
                    <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
