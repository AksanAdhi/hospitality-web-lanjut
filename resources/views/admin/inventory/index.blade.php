<!-- resources/views/admin/inventory/index.blade.php -->
<x-layout>
    <x-slot:title>Daftar Inventaris Obat</x-slot:title>

    <div class="flex justify-between mb-4">
        <h2 class="text-xl font-semibold text-gray-800">Inventaris Obat</h2>
        <a href="{{ route('admin.inventory.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Obat</a>

    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full table-auto border-collapse border border-gray-300">
        <thead>
            <tr>
                <th class="border px-4 py-2">Nama Obat</th>
                <th class="border px-4 py-2">Jumlah</th>
                <th class="border px-4 py-2">Tanggal Kadaluarsa</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventory as $item)
                <tr>
                    <td class="border px-4 py-2">{{ $item->medicine_name }}</td>
                    <td class="border px-4 py-2">{{ $item->quantity }}</td>
                    <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($item->expiry_date)->format('d M Y') }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('inventory.edit', $item->id) }}" class="text-blue-500">Edit</a> |
                        <form action="{{ route('inventory.destroy', $item->id) }}" method="POST" class="inline">
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
