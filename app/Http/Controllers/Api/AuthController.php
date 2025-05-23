<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(): JsonResponse
    {
        request()->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required'
        ]);

        $user = User::where('email', request()->email)->first();

        if (!$user) {
            return response()->json([
                'message' => 'Usuario no encontrado'
            ]);
        } else if (!Hash::check(request()->password, $user->password)) {
            return response()->json(["message" => "la contraseña no es correcta"]);
        }

        return response()->json([
            'token' => $user->createToken(request()->device_name)->plainTextToken,
            'user' => ['id' => $user->id,'name' => $user->name, 'email' => $user->email,'permissions' => $user->getAllPermissions()->pluck('name')]
        ], 200);

    }
    public function logout(Request $request): JsonResponse
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logged out'
        ]);
    }
    public function getUser(Request $request)
    {


        return $request->user;

    }
    public function getTokens(Request $request): JsonResponse
    {

        // if ($request->has('email')) {
        //     return response()->json(['error' => 'El campo email es requerido']);
        // }
        $user = User::where('email', request()->email)->first();


        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }
        return response()->json(['user' => $user, 'token_existente' => $user->tokens]);
    }
}
