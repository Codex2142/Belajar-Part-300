<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class loginMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Login First');
        }

        $userLevel = Auth::user()->level;
        if (in_array($userLevel, $roles)) {
            return $next($request);
        }

        return abort(403, 'Forbidden Access');
    }
}
