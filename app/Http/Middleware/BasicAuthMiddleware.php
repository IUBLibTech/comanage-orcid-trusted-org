<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BasicAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
	$username = env('BASIC_AUTH_USER', 'admin'); // Set in .env file
        $password = env('BASIC_AUTH_PASS', 'password'); // Set in .env file

        $providedUsername = $request->getUser();
        $providedPassword = $request->getPassword();

        if ($providedUsername !== $username || $providedPassword !== $password) {
            return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED)
                ->header('WWW-Authenticate', 'Basic realm="Restricted Area"');
	} 

	return $next($request);
    }
}
