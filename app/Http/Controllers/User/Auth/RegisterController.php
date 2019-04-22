<?php

namespace App\Http\Controllers\User\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Intervention\Image\ImageManagerStatic as Image;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => ['type' => 'validation_failed', 'fields' => $validator->errors(), 'message' => 'Missing request parameter.']], 400);
        }

        $img = Image::make('https://dummyimage.com/50x50/000/fff&text='. sbstr($request->get('email'), 0, 2));
        $path = storage_path('app/public/users/profile/images');
        $img_url = str_replace(storage_path('app/public/'), '', $path);
        $img_name = strval(md5(time())).'.jpg';
        $img_url .= '/'.$img_name;
        echo $img_url;
        $img->save($path.'/' . $img_name);

        $user = User::create([
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'profile_image_url' => $img_url,
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user', 'token'), 201);
    }
}
