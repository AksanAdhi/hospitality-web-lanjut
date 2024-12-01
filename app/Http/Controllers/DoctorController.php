<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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

    
    // Menampilkan halaman edit profile
    public function editProfile()
    {
        $user = Auth::user(); // Mendapatkan user yang sedang login
        return view('doctor.profile.edit', compact('user'));
    }

    // Memproses pembaruan profil
    public function updateProfile(Request $request)
{
    $request->validate([
        'username' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'profilePicture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $user = auth()->user();

    // Proses upload gambar
    if ($request->hasFile('profilePicture')) {
        $file = $request->file('profilePicture');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/profile_pictures'), $filename);

        // Hapus gambar lama jika ada
        if ($user->profilePicture && file_exists(public_path('uploads/profile_pictures/' . $user->profilePicture))) {
            unlink(public_path('uploads/profile_pictures/' . $user->profilePicture));
        }

        $user->profilePicture = $filename;
    }

    // Update data user
    $user->update([
        'username' => $request->username,
        'name' => $request->name,
        'email' => $request->email,
        'profilePicture' => $user->profilePicture,
    ]);

    return redirect()->back()->with('success', 'Profile updated successfully.');
}


    // Menampilkan halaman ubah password
    public function showChangePasswordForm()
    {
        return view('doctor.profile.password');
    }

    // Memproses ubah password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = Auth::user();

        // Periksa apakah current_password cocok
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        // Update password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('doctor.password.change')->with('success', 'Password updated successfully!');
    }
}
