<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\User;
use App\Facades\CRUD;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Requests\RegisterFormRequest;
use Symfony\Component\HttpFoundation\Request;


class JwtAuthController extends Controller
{
    public function register(RegisterFormRequest $request, User $user)
    {
        $request->merge(['password' => Hash::make($request->password)]);
        return response()->json(['data' => CRUD::store($user, $request)], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return ['status' => 'success', 'token' => $token];
    }

    public function logout(Request $request)
    {
        $token = $request->header('Authorization');
        try {
            return ['status' => JWTAuth::invalidate($token)];
        } catch (JWTException $e) {
            return response()->json(['error' => 'User successfully logged out'], 500);
        }
    }

    public function refresh()
    {
        try {
            $token = JWTAuth::refresh();
            return response()->json(['refresh-token' => $token], 200);
        } catch (JWTException $e) {
            return response()->json(['error' => 'User refresh not token'], 500);
        }

    }

    public function getUser()
    {
        $user = JWTAuth::parseToken()->authenticate();
        return $user;
    }


}
