<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (session()->get('is_admin') != 1 && empty(session()->get('admin_id')) && session()->get('status') != 1) {
            return $next($request);
        }else {
            return redirect()->route('admin_panel.dashboard');
        }

    }
}


