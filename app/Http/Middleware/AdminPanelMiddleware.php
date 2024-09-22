<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminPanelMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (session()->get('role_id') <= 3 && session()->get('is_admin') == 1) {

            if ( session()->get('status') == 1) {

                return $next($request);

            }else {
                return redirect()->route('admin_deactive');
            }

        }else{
            return redirect()->route('admin_panel.signin');
        }

    }
}

