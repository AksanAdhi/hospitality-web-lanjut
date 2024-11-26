<!-- resources/views/admin/patients/create.blade.php -->
<x-layout>
    <x-slot:title>Tambah Pasien</x-slot:title>

    <form action="{{ route('patients.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" name="nama" id="nama" class="mt-1 block w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
            <input type="text" name="nik" id="nik" class="mt-1 block w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="mt-1 block w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="mt-1 block w-full p-2 border rounded" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
            <textarea name="alamat" id="alamat" class="mt-1 block w-full p-2 border rounded" required></textarea>
        </div>

        <div class="mb-4">
            <label for="telepon" class="block text-sm font-medium text-gray-700">Telepon</label>
            <input type="text" name="telepon" id="telepon" class="mt-1 block w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label for="riwayat_penyakit" class="block text-sm font-medium text-gray-700">Riwayat Penyakit</label>
            <textarea name="riwayat_penyakit" id="riwayat_penyakit" class="mt-1 block w-full p-2 border rounded"></textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</x-layout>
