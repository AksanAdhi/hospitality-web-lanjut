<!-- resources/views/admin/appointments/create.blade.php -->
<x-layout>
    <x-slot:title>Tambah Janji Temu</x-slot:title>

    <form action="{{ route('appointments.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="patient_id" class="block text-sm font-medium text-gray-700">Pasien</label>
            <select name="patient_id" id="patient_id" class="mt-1 block w-full p-2 border rounded" required>
                <option value="">Pilih Pasien</option>
                @foreach($patients as $patient)
                <option value="{{ $patient->id }}">{{ $patient->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="doctor_id" class="block text-sm font-medium text-gray-700">Dokter</label>
            <select name="doctor_id" id="doctor_id" class="mt-1 block w-full p-2 border rounded" required>
                <option value="">Pilih Dokter</option>
                @foreach($doctors as $doctor)
                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="appointment_date" class="block text-sm font-medium text-gray-700">Tanggal Janji Temu</label>
            <input type="datetime-local" name="appointment_date" id="appointment_date" class="mt-1 block w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label for="notes" class="block text-sm font-medium text-gray-700">Catatan</label>
            <textarea name="notes" id="notes" class="mt-1 block w-full p-2 border rounded"></textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</x-layout>
