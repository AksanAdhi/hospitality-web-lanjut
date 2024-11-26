<!-- resources/views/admin/inventory/create.blade.php -->
<x-layout>
    <x-slot:title>Tambah Obat</x-slot:title>

    <form action="{{ route('inventory.store') }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label for="medicine_name" class="block text-gray-700 font-medium">Nama Obat</label>
        <input type="text" name="medicine_name" id="medicine_name" required
            class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500">
    </div>

    <div>
        <label for="quantity" class="block text-gray-700 font-medium">Jumlah</label>
        <input type="number" name="quantity" id="quantity" required min="1"
            class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500">
    </div>

    <div>
        <label for="expiry_date" class="block text-gray-700 font-medium">Tanggal Kadaluarsa</label>
        <input type="date" name="expiry_date" id="expiry_date" required
            class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500">
    </div>

    <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Simpan</button>
</form>

</x-layout>
