<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

     //kode lama
    // public function handle($request, Closure $next)
    // {
    //     return $next($request);
    // }

    //kode yang baru ditambahkan
    public function handle($request, Closure $next, String $role) {
        if (!Auth::check()) // This isnt necessary, it should be part of your 'auth' middleware
          return redirect('/login');
    
        $user = Auth::user();
        if($user->role == $role)
          return $next($request);
    
        // $request->session()->flush();
        // $request->session()->regenerate();
        return redirect('/login');
    }
}
