<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\Exceptions\JWTException;

class JwtMiddleware extends BaseMiddleware
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
            $token = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json(['error' => ['type' => 'token_invalid', 'message' => 'Token is invalid, must re-authenticate the user catch -> if.']], 401);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                try {
                    // If token Expired we try to refresh it (2 weeks until it will be blacklisted)
                    // We change the current token of the request
                    // Then we pass it back to the application using Header of the request
                    $new_token = JWTAuth::refresh(JWTAuth::getToken());
                    $user = JWTAuth::setToken($new_token)->toUser();
                    $request->headers->set('Authorization', 'Bearer ' . $new_token);
                    header('Authorization: Bearer ' . $new_token);
                } catch (JWTException $e) {
                    return response()->json(['error' => ['type' => 'token_blacklisted', 'message' => 'Token is now blacklisted, must re-authenticate the user catch -> else-if -> catch.'.$e]], 401);
                }
            }else {
                return response()->json(['error' => ['type' => 'token_not_found', 'message' => 'Token not found, must re-authenticate the user.']], 401);
            }
        }
        return $next($request);
    }
}