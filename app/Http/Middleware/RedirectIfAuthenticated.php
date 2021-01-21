<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    //kode lama
    // public function handle($request, Closure $next, $guard = null)
    // {
    //     if (Auth::guard($guard)->check()) {
    //         return redirect(RouteServiceProvider::HOME);
    //     }

    //     return $next($request);
    // }

    //kode yang baru ditambahkan
    public function handle($request, Closure $next, $guard = null) {
        if (Auth::guard($guard)->check()) {
          $role = Auth::user()->role; 
      
          switch ($role) {
            case 'administrator':
               return '/administrator/dashboard';
               break;
            case 'ao':
               return '/account_officer/dashboard';
               break;
               case 'pimpinan':
                return '/pimpinan/dashboard';
                break;
                case 'supervisor':
                return '/supervisor/dashboard';
                break; 
      
            default:
                
                return '/login';
               break;
          }
        }
        return $next($request);
    }
}
