<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\User;
use App\Facades\CRUD;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Requests\RegisterFormRequest;
use Symfony\Component\HttpFoundation\Request;
use Auth;

class JwtAuthController extends Controller
{
    /**
     * @param RegisterFormRequest $request
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterFormRequest $request, User $user)
    {
        $request->merge(['password' => Hash::make($request->password)]);
        return response()->json(['data' => CRUD::store($user, $request)], 201);
    }

    /**
     * @param Request $request
     * @return array|\Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return ['status' => 'success', 'token' => $token];
    }

    /**
     * @param Request $request
     * @return array|\Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $token = $request->header('Authorization');
        try {
            return ['status' => JWTAuth::invalidate($token)];
        } catch (JWTException $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * @return array
     */
    public function refresh()
    {
        try{
            $newToken = JWTAuth::refresh(JWTAuth::getToken());
            return ['token' => $newToken];
        }catch (JWTException $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }

    }


    public function getUser()
    {
        return ['user' => Auth::user()];

    }


}
