<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => ['type' => 'invalid_credentials', 'message' => 'Email/Password invalid']], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => ['type' => 'could_not_create_token', 'message' => 'Email/Password invalid']], 500);
        }
        return response()->json(compact('token'));
    }

    public function getAuthenticatedUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['error' => ['type' => 'user_not_found', 'message' => 'User not found in database']], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['error' => ['type' => 'token_expired', 'message' => $e->getMessage()]], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['error' => ['type' => 'token_invalid', 'message' => $e->getMessage()]], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['error' => ['type' => 'token_absent', 'message' => $e->getMessage()]], $e->getStatusCode());
        }
        return response()->json(compact('user'));
    }
}
