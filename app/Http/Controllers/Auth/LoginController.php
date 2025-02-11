<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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


protected function redirectTo()
    {
        $user = Auth::user(); // Get the authenticated user

        
        // Check if the user has any roles
        if ($user && $user->role_id) {
            dd('working');
            // Check if the user has the 'doctor' role
            // if ($user->roles->contains('name', 'doctor')) {
            //     return route('doctor.dashboard'); // Redirect to doctor dashboard
            // }

            // Redirect to the home route for other roles
            return route('dashboard'); 
        }

        // Redirect to the default route for users without roles
        return route('dashboard');
    }


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

}
