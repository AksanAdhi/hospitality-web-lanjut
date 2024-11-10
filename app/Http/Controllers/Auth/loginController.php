<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    function __construct(){
        $this->middleware('guest')->except('logout');
    }
    
    function showLoginForm(){
        return view('auth.login');
    }
    


    function login(Request $request){

        // Validasi data
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|min:6'
        ]);

        // mencari user berdasarkan username
        $user = User::where('username', $request->username)->first();

        // pencocokan password
        if($user && password_verify($request->password, $user->password)){
            Auth::login($user);
            return redirect('/home');
        }

        // Jika username atau password salah
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);

    }
    
    // Logout
    public function logout(Request $request)
    {
        Auth::logout(); // Mengeluarkan user dari session

        $request->session()->invalidate(); // Menghapus semua data session
        $request->session()->regenerateToken(); // Mencegah CSRF setelah logout

        return redirect('/login'); // Mengarahkan ke halaman login
    }

}
