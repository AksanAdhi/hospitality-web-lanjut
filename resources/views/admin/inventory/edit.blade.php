<!-- resources/views/admin/inventory/edit.blade.php -->
<x-layout>
    <x-slot:title>Edit Data Inventaris Obat</x-slot:title>

    <h2 class="text-xl font-semibold mb-4">Edit Data Inventaris Obat</h2>

    <!-- Display any error messages -->
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('inventory.update', $inventory->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Nama Obat -->
        <div>
            <label for="medicine_name" class="block font-medium text-gray-700">Nama Obat</label>
            <input type="text" name="medicine_name" id="medicine_name" value="{{ old('medicine_name', $inventory->medicine_name) }}" required
                   class="w-full px-4 py-2 border rounded">
        </div>

        <!-- Jumlah Obat -->
        <div>
            <label for="quantity" class="block font-medium text-gray-700">Jumlah</label>
            <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $inventory->quantity) }}" required
                   class="w-full px-4 py-2 border rounded" min="1">
        </div>

        <!-- Tanggal Kadaluarsa -->
        <div>
            <label for="expiry_date" class="block font-medium text-gray-700">Tanggal Kadaluarsa</label>
            <input type="date" name="expiry_date" id="expiry_date" value="{{ old('expiry_date', \Carbon\Carbon::parse($inventory->expiry_date)->toDateString()) }}" required
                   class="w-full px-4 py-2 border rounded">
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Inventaris</button>
            <a href="{{ route('inventory.index') }}" class="ml-4 text-gray-600">Kembali</a>
        </div>
    </form>
</x-layout>
