<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    // Halaman daftar pasien
    public function indexPatients()
    {
        $patients = Patient::all(); // Mengambil data pasien
        return view('doctor.patients.index', compact('patients')); // Pastikan view ini ada
    }
    

    // Halaman dashboard dokter
    public function home()
    {
        return view('doctor.home');
    }

    // Menampilkan daftar janji temu pasien
    public function showForPatient(Patient $patient)
    {
        // Mengambil janji temu berdasarkan pasien
        $appointments = $patient->appointments; // Pastikan relasi appointments ada di model Patient
        return view('doctor.appointments.index', compact('patient', 'appointments'));
    }

    // Melihat semua janji temu dokter
    public function appointments()
    {
        // Ambil janji temu dengan relasi pasien dan dokter
        $appointments = Appointment::with(['patient', 'doctor'])->where('doctor_id', auth()->id())->get();
        return view('doctor.appointments.index', compact('appointments'));
    }

    // Melihat data detail pasien
    public function viewPatient($id)
    {
        // Mengambil detail pasien berdasarkan ID
        $patient = Patient::findOrFail($id);
        return view('doctor.patients.show', compact('patient'));
    }

    public function show($id)
{
    $appointment = Appointment::with(['patient', 'doctor'])->findOrFail($id);
    return view('doctor.appointments.show', compact('appointment'));
}
}
