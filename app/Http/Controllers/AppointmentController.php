<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    // Menampilkan daftar janji temu
    public function index()
    {
        // Ambil semua janji temu yang ada
        $appointments = Appointment::with(['patient', 'doctor'])->get();
        return view('admin.appointments.index', compact('appointments'));
    }

    // Menampilkan form untuk menambah janji temu baru
    public function create()
    {
        // Ambil semua pasien dan dokter untuk dipilih dalam form
        $patients = Patient::all();
        $doctors = User::where('level', 'user')->get(); // Pastikan hanya dokter yang dipilih
        return view('admin.appointments.create', compact('patients', 'doctors'));
    }

    // Menyimpan janji temu yang baru
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:users,id',
            'appointment_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        // Simpan janji temu ke database
        Appointment::create([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'appointment_date' => $request->appointment_date,
            'notes' => $request->notes,
        ]);

        // Redirect setelah janji temu berhasil disimpan
        return redirect()->route('appointments.index')->with('success', 'Janji temu berhasil dibuat.');
    }

    // Menampilkan detail janji temu
    public function show(Appointment $appointment)
    {
        return view('admin.appointments.show', compact('appointment'));
    }

    // Untuk Dokter
    public function showForDoctor(Appointment $appointment)
{
    return view('doctor.appointments.show', compact('appointment'));
}


    // Menampilkan form untuk mengedit janji temu
    public function edit(Appointment $appointment)
    {
        // Ambil data pasien dan dokter untuk dipilih dalam form
        $patients = Patient::all();
        $doctors = User::where('level', 'user')->get();
        return view('admin.appointments.edit', compact('appointment', 'patients', 'doctors'));
    }

    // Mengupdate janji temu
    public function update(Request $request, Appointment $appointment)
    {
        // Validasi input dari form
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:users,id',
            'appointment_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        // Update data janji temu di database
        $appointment->update([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'appointment_date' => $request->appointment_date,
            'notes' => $request->notes,
        ]);

        // Redirect setelah janji temu berhasil diupdate
        return redirect()->route('appointments.index')->with('success', 'Janji temu berhasil diperbarui.');
    }

    // Menghapus janji temu
    public function destroy(Appointment $appointment)
    {
        // Hapus janji temu dari database
        $appointment->delete();

        // Redirect setelah janji temu berhasil dihapus
        return redirect()->route('appointments.index')->with('success', 'Janji temu berhasil dihapus.');
    }


}
