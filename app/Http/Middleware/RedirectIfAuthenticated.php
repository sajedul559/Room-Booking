<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{

   public function handle($request, Closure $next, ...$guards)
    {
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::user(); // Get authenticated user

                // Check user roles and redirect accordingly
                if ($user->roles->isNotEmpty()) {
                    // Redirect to a common route for users with any role
                    return redirect()->route('dashboard');
                }

                // Default fallback if no roles or roles don't match
                return redirect('/home');
            }
        }

        return $next($request);
    }

}
