<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function login(LoginRequest $request)
    {

        if(auth()->attempt($request->only('email', 'password'))) {
            $token = auth()->user()->createToken('Token');
            return response()->json(['token' => $token->plainTextToken], 200);
        }

        return response()->json(['error' => 'Datos incorrectos']);

    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logged out'
        ]);
    }
}
