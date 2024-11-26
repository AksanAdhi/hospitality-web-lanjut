<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Inventory;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Menampilkan halaman dashboard admin
    public function home()
    {
        return view('admin.home');
    }

    // Mengelola data pasien
    public function managePatients()
    {
        $patients = Patient::all();
        return view('admin.patients.index', compact('patients'));
    }

    // Mengelola data inventaris obat
    public function manageInventory()
    {
        $inventory = Inventory::all();
        return view('admin.inventory.index', compact('inventory'));
    }

    // Menjadwalkan dan mengelola janji temu
    public function manageAppointments()
    {
        $appointments = Appointment::with(['patient', 'doctor'])->get();
        return view('admin.appointments.index', compact('appointments'));
    }

    // Fungsi lain seperti tambah, edit, dan hapus untuk pasien, obat, dan janji temu

    public function createPatient()
    {
        return view('admin.patients.create');
    }

    public function storePatient(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|unique:patients',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'telepon' => 'required|string',
        ]);

        Patient::create($request->all());
        return redirect()->route('admin.managePatients')->with('success', 'Data pasien berhasil ditambahkan');
    }

    public function editPatient($id)
    {
        $patient = Patient::findOrFail($id);
        return view('admin.patients.edit', compact('patient'));
    }

    public function updatePatient(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);
        $patient->update($request->all());
        return redirect()->route('admin.managePatients')->with('success', 'Data pasien berhasil diperbarui');
    }

    public function deletePatient($id)
    {
        Patient::findOrFail($id)->delete();
        return redirect()->route('admin.managePatients')->with('success', 'Data pasien berhasil dihapus');
    }

    // Tambahkan fungsi yang mirip untuk Inventaris Obat dan Janji Temu
}
