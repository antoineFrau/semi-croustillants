<?php

namespace App\Http\Controllers\User\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        JWTAuth::invalidate(JWTAuth::parseToken());
        return response()->json(['status' => 'Successfully logout'], 200);
    }
}
