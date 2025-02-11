<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->type === 'admin') {
            return $next($request);
        }
        if (Auth::check() && Auth::user()->type === 'user') {
            return redirect()->route('index');
        }

        return redirect('/admin-login')->withErrors('You do not have access to this section.');
    }
}

