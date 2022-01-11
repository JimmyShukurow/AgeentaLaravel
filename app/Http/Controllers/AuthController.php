<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function loginToAdmin(AuthRequest $request)
    {
        $validated = $request->validated();

        if(Auth::attempt($validated)){

            $user = User::where('email', $request['email'])->firstOrFail();

            $user->tokens()->delete();

            $token = $user->createToken('auth_token',['property:delete'])->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
        }
        return response()->json('invalide', 401);
    }

    public function register(RegisterRequest $request)
    {
        return 'ok';
    }

    public function refreshToken(Request $request)
    {
        $user = User::where('refresh_token', $request->token)->first();
        $user->tokens()->delete();
        $new_token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $new_token,
        ]);
    }




   
}
