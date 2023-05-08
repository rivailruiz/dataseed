<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Exception;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $token = $request->header('Authorization');

            if (!$token) {
                throw new Exception('Token not provided');
            }

            $user = JWTAuth::parseToken()->authenticate();

            if (!$user) {
                throw new Exception('User not found');
            }

            return $next($request);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }
}
