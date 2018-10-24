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

    public function __construct()
    {
        $this->middleware('jwt.auth')->only(['register', 'getUser']);
    }

    public function register(RegisterFormRequest $request, User $user)
    {
        $request->merge(['password' => Hash::make($request->password)]);
        return ['data' => CRUD::store($user, $request)];
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return ['token' => $token];
    }

    public function getUser()
    {
        $user = JWTAuth::parseToken()->authenticate();
        return $user;
    }
}
