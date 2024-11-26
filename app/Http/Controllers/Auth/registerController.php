<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use function Laravel\Prompts\password;

class registerController extends Controller
{
    function showRegisterForm(){
        return view('auth.register');
    }

    function register(Request $request){
        // validasi form register
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'profilePicture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // upload gambar
        $profilePicture = $request->file('profilePicture');
        $profilePictureName= 'default.png';
        if($profilePicture){
            $profilePictureName=time().'_'.$profilePicture->getClientOriginalName();
            $profilePicture->move(public_path('uploads/profile_pictures'), $profilePictureName);
        }
        // membuat user
        User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'profilePicture' => $profilePictureName,
            'level' => 'user',
            
        ]);
        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');

    }

    
    
}
