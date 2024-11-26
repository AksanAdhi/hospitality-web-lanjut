<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // Menampilkan daftar pasien
    public function index()
    {
        $patients = Patient::all(); // Ambil semua data pasien
        return view('admin.patients.index', compact('patients'));
    }

    public function indexForDoctor()
{
    $patients = Patient::all(); // Ambil semua data pasien
    return view('doctor.patients.index', compact('patients'));
}


    // Menampilkan form untuk menambah pasien baru
    public function create()
    {
        return view('admin.patients.create');
    }

    // Menyimpan data pasien yang baru
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:16|unique:patients,nik',  // Validasi NIK unik
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:15',
            'riwayat_penyakit' => 'nullable|string',
        ]);

        // Simpan data pasien ke database
        Patient::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'riwayat_penyakit' => $request->riwayat_penyakit,
        ]);

        // Redirect ke halaman daftar pasien setelah data tersimpan
        return redirect()->route('patients.index')->with('success', 'Pasien berhasil ditambahkan.');
    }

    // Menampilkan detail data pasien
    public function show(Patient $patient)
    {
        return view('admin.patients.show', compact('patient'));
    }

    // Menampilkan form untuk mengedit data pasien
    public function edit(Patient $patient)
    {
        return view('admin.patients.edit', compact('patient'));
    }

    // Mengupdate data pasien
    public function update(Request $request, Patient $patient)
    {
        // Validasi input dari form
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:16|unique:patients,nik,' . $patient->id, // Validasi NIK unik, kecuali untuk pasien ini
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:15',
            'riwayat_penyakit' => 'nullable|string',
        ]);

        // Update data pasien di database
        $patient->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'riwayat_penyakit' => $request->riwayat_penyakit,
        ]);

        // Redirect setelah data berhasil diupdate
        return redirect()->route('patients.index')->with('success', 'Data pasien berhasil diperbarui.');
    }

    // Menghapus data pasien
    public function destroy(Patient $patient)
    {
        // Hapus pasien dari database
        $patient->delete();

        // Redirect dengan pesan sukses setelah penghapusan
        return redirect()->route('patients.index')->with('success', 'Pasien berhasil dihapus.');
    }
}
