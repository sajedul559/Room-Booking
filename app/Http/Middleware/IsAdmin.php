<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->type === User::USER_TYPE_ADMIN ||  Auth::user()->type === User::USER_TYPE_VENDOR) {
            return $next($request);
        }

        if (Auth::check() && Auth::user()->type === User::USER_TYPE_USER) {
            return redirect()->route('index');
        }

        return redirect('/admin-login')->withErrors('You do not have access to this section.');
    }
}

