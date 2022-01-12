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

            $token = $user->createToken('auth_token',[$user->getRoleNames()->first()])->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
        }
        return response()->json('invalide', 401);
    }

    public function register(RegisterRequest $request)
    {
       
        $validated = $request->safe()->only(['email', 'password', 'mobile_number']);
        $validated['password'] = bcrypt($request->safe()->password);
        $validated['name'] = $request->safe()->name.' '.$request->safe()->surname;
        $user = User::create($validated);

        if($request->has('role')){
            if($request->role == 'corporate'){
                $user->corporate()->create($request->safe()->except(['email', 'password', 'mobile_number', 'password', 'name', 'surname']));
            }
            $user->assignRole($request->role);
        }else{
            
            $user->assignRole('user');
        }

        return response()->json(['name' => $user->name, 'role' => $user->getRoleNames()->first()], 201);
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

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json('goodbye', 200);
    }




   
}
