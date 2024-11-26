<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticatedWithRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Redirect berdasarkan role
            if ($user->level === 'admin') {
                return redirect()->route('admin.home');
            }

            if ($user->level === 'user') {
                return redirect()->route('doctor.home');
            }
        }

        return $next($request);
    }
}
