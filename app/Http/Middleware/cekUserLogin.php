<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class cekUserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next, $rules)
    {
        $user = Auth::User();

        if (!Auth::check()) {
            return redirect('login');
        }
        if ($user->level == $rules)
            return $next($request);

        return redirect('login')->with('error', 'you have no priviledge');
    }
}
