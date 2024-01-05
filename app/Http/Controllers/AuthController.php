<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/**
 * @OA\Info(title="TEST API PERZONA", version="1.0")
 * 
 * @OA\Server(url="http://testapi-perzona.test")
 * 
 * @OAS\SecurityScheme(
 *      securityScheme="bearer_token",
 *      type="http",
 *      scheme="bearer"
 * )
 */

class AuthController extends Controller
{
    /**
     * @OA\Post(
     * path="/api/login",
     * summary="Iniciar Sesion",
     * description="Se requiere email y password",
     * operationId="login",
     * tags={"Login"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Credenciales",
     *    @OA\JsonContent(
     *       required={"email","password"},
     *       @OA\Property(property="email", type="string", format="email", example="admin@perzona.com"),
     *       @OA\Property(property="password", type="string", format="password", example="12345678"),
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="credenciales correctas",
     *    @OA\JsonContent(
     *          @OA\Property(property="token", type="string", example="8|Vno7VCA6gKJIo0hxhc5WlcCJpa3uuXHO2YO92zml68102b7a")
     *        )
     *     )
     * )
     */
    public function login(LoginRequest $request)
    {

        if(auth()->attempt($request->only('email', 'password'))) {
            $token = auth()->user()->createToken('Token');
            return response()->json(['token' => $token->plainTextToken], 200);
        }

        return response()->json(['error' => 'Datos incorrectos']);

    }

    /**
     * @OA\Post(
     * path="/api/logout",
     * summary="Cerrar Sesion",
     * operationId="logout",
     * tags={"Logout"},
     * @OA\Response(
     *    response=201,
     *    description="respuesta",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Sesion cerrada correctamente")
     *        )
     *     )
     * )
     */

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logged out'
        ]);
    }
}
