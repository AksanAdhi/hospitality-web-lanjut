<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    function __construct()
    {
        $this->middleware('redirect.if.authenticated')->except('logout');
    }


    // Menampilkan halaman login
    function showLoginForm()
    {
        return view('auth.login');
    }

    // Menangani permintaan login
    function login(Request $request)
    {
        // Validasi form login
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|min:6'
        ]);

        // Mencari user berdasarkan username
        $user = User::where('username', $request->username)->first();

        // Mencocokkan password
        if ($user && password_verify($request->password, $user->password)) {
            Auth::login($user);

            // Mengalihkan berdasarkan role
            if ($user->level == 'admin') {
                return redirect()->route('admin.home');  // Ganti dengan route halaman dashboard admin
            }

            return redirect()->route('doctor.home');  // Ganti dengan route halaman dashboard user
        }

        // Jika username atau password salah
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }

    // Fungsi logout
    public function logout(Request $request)
    {
        Auth::logout();  // Logout user

        $request->session()->invalidate();  // Invalidate data session
        $request->session()->regenerateToken();  // Cegah CSRF setelah logout

        return redirect('/login');  // Redirect ke halaman login setelah logout
    }
}
