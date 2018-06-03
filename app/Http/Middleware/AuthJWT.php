<?php

namespace App\Http\Middleware;

use JWTAuth;
use Closure;

class AuthJWT
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::toUser($request->header('Authorization'));
        } catch (\Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json(['error'=>'Token is Invalid']);
            } elseif ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return response()->json(['error'=>'Token is Expired']);
            } elseif ($e instanceof \Tymon\JWTAuth\Exceptions\JWTException) {
                return response()->json(['error'=>'A token is required']);
            } else {
                return response()->json(['error'=>'Something is wrong']);
            }
        }
        
        return $next($request);
    }
}
