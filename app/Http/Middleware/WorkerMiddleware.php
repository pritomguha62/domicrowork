<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WorkerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (session()->get('role_id') == 4 && session()->get('is_worker') == 1) {

            if ( session()->get('status') == 1) {

                return $next($request);

            }else {

                return redirect()->route('member_deactive');

            }

        }else{

            return redirect()->route('client_panel.dashboard')->with('error', 'Buy package to do daily tasks..!');

        }

    }
}

