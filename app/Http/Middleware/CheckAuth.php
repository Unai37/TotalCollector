<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('usuario_id') || !Session::has('rol')) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
