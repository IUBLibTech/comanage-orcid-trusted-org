<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Subfission\Cas\Facades\Cas;

class CasAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle(Request $request, Closure $next): Response
    {
	 if (!Cas::isAuthenticated()) {
            Cas::authenticate(); // Redirect to the CAS login page
        }    
	session()->put('cas_user', cas()->user() );     
	 return $next($request);
    }
}
