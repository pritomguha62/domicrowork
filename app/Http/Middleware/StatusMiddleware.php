<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StatusMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->get('role_id') <= 3 && session()->get('status') == 1 && session()->get('is_admin') == 1) {

            return redirect(route('admin_panel.dashboard'));

        }elseif (session()->get('role_id') == 4 && session()->get('status') == 1 && session()->get(key: 'is_worker') == 1) {

            return redirect(route('client_panel.dashboard'));

        }elseif (session()->get('role_id') == 4 && session()->get('status') == 1 && session()->get(key: 'is_client') == 1) {

            return redirect(route('client_panel.dashboard'));

        }elseif (session()->get('status') != 1) {

            if ( session()->has('member_id') or session()->has('admin_id')) {

                return $next($request);
            }else {

                return redirect(route('home'));

            }

        }else {

            return redirect(route('home'));

        }
    }
}


