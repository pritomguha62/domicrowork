<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (session()->get('role_id') == 4 && session()->get('is_client') == 1) {

            // if ( session()->get('status') == 1) {

                return $next($request);

            // }else {
            //     return redirect()->route('member_deactive');
            // }

        }elseif(session()->get('role_id') == 4 && session()->get('is_client') == 0){

            // return redirect()->route('logout');
            return redirect()->route('home')->with('error', 'Your account has been banned. If you think we have done a mistake, please contact us.');

        }else{

            return redirect()->route('member_deactive');

        }

    }
}


