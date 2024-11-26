<!-- resources/views/admin/appointments/index.blade.php -->
<x-layout>
    <x-slot:title>Daftar Janji Temu</x-slot:title>

    <div class="mb-4">
        <a href="{{ route('appointments.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Janji Temu</a>
    </div>

    <table class="min-w-full table-auto border-collapse">
        <thead>
            <tr>
                <th class="px-4 py-2 border-b">Pasien</th>
                <th class="px-4 py-2 border-b">Dokter</th>
                <th class="px-4 py-2 border-b">Tanggal Janji Temu</th>
                <th class="px-4 py-2 border-b">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
            <tr>
                <td class="px-4 py-2 border-b">{{ $appointment->patient->nama }}</td>
                <td class="px-4 py-2 border-b">{{ $appointment->doctor->name }}</td>
                <td class="px-4 py-2 border-b">{{ $appointment->appointment_date }}</td>
                <td class="px-4 py-2 border-b">
                    <a href="{{ route('appointments.edit', $appointment->id) }}" class="text-yellow-500">Edit</a> | 
                    <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" class="inline-block">
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
