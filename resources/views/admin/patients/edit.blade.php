<!-- resources/views/admin/patients/edit.blade.php -->
<x-layout>
    <x-slot:title>Edit Data Pasien</x-slot:title>

    <h2 class="text-xl font-semibold mb-4">Edit Data Pasien</h2>

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

    <form action="{{ route('patients.update', $patient->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Nama Pasien -->
        <div>
            <label for="nama" class="block font-medium text-gray-700">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama', $patient->nama) }}" required
                   class="w-full px-4 py-2 border rounded">
        </div>

        <!-- NIK Pasien -->
        <div>
            <label for="nik" class="block font-medium text-gray-700">NIK</label>
            <input type="text" name="nik" id="nik" value="{{ old('nik', $patient->nik) }}" required
                   class="w-full px-4 py-2 border rounded">
        </div>

        <!-- Tanggal Lahir -->
        <div>
            <label for="tanggal_lahir" class="block font-medium text-gray-700">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', $patient->tanggal_lahir) }}" required
                   class="w-full px-4 py-2 border rounded">
        </div>

        <!-- Jenis Kelamin -->
        <div>
            <label for="jenis_kelamin" class="block font-medium text-gray-700">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" required class="w-full px-4 py-2 border rounded">
                <option value="Laki-laki" {{ old('jenis_kelamin', $patient->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin', $patient->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <!-- Alamat -->
        <div>
            <label for="alamat" class="block font-medium text-gray-700">Alamat</label>
            <textarea name="alamat" id="alamat" required class="w-full px-4 py-2 border rounded">{{ old('alamat', $patient->alamat) }}</textarea>
        </div>

        <!-- Telepon -->
        <div>
            <label for="telepon" class="block font-medium text-gray-700">Telepon</label>
            <input type="text" name="telepon" id="telepon" value="{{ old('telepon', $patient->telepon) }}" required
                   class="w-full px-4 py-2 border rounded">
        </div>

        <!-- Riwayat Penyakit -->
        <div>
            <label for="riwayat_penyakit" class="block font-medium text-gray-700">Riwayat Penyakit</label>
            <textarea name="riwayat_penyakit" id="riwayat_penyakit" class="w-full px-4 py-2 border rounded">{{ old('riwayat_penyakit', $patient->riwayat_penyakit) }}</textarea>
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Pasien</button>
            <a href="{{ route('patients.index') }}" class="ml-4 text-gray-600">Kembali</a>
        </div>
    </form>
</x-layout>
