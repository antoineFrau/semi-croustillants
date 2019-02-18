<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
}
