<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //kode lama
    // protected $redirectTo = RouteServiceProvider::HOME;

    //kode yang baru ditambahkan
    public function redirectTo() {
        $role = Auth::user()->role; 
        switch ($role) {
          case 'administrator':
            return '/administrator/dashboard';;
            break;
          case 'ao':
            return '/account_officer/dashboard';;
            break; 
            case 'pimpinan':
                return '/pimpinan/dashboard';;
                break; 
      
          default:
            return '/supervisor/dashboard'; 
          break;
        }
      }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
