<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use illuminate\Support\Facades\Session;

use Symfony\Component\HttpFoundation\Response;


class Authadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check())
        { 
            if(Auth::user()->utype === 'ADM')
            {
                return $next($request);
            }
            else
            {
               session::flush();
               return redirect()->route('login');   
            }

        }
        else
        {
            return redirect()->route('login');
        }
    }
}
