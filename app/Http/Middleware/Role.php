<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Memeriksa apakah pengguna sudah login dan memiliki level yang sesuai
        if (Auth::check() && Auth::user()->level === $role) {
            return $next($request);
        }

        // Jika tidak memiliki hak akses, redirect ke halaman tertentu (misalnya, login atau halaman error)
        return redirect('/login')->withErrors(['access' => 'Anda tidak memiliki hak akses.']);
    }
}
