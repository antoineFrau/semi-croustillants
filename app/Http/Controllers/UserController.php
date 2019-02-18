<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
    public function getAuthenticatedUser()
    {
        try {
            if (! $user = JWTAuth::parseToken()->authenticate()){
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