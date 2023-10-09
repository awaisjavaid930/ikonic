<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;


class UserController extends Controller
{
    public function register(StoreUserRequest $request)
    {
       $validated = $request->validated();
       $validated['password'] = Hash::make($validated['password']);
        User::create($validated);
        return response()->json(['status' => 200 , 'message' => 'record saved']);
    }
    
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = User::whereEmail($validated['email'])->firstOrFail();
            $user['token'] = $user->createToken('API TOKEN')->plainTextToken;
            return response()->json(['status' => 200 , 'data' => UserResource::make($user) , 'message' => 'user login' ]);
        }
        return response(['message' => 'Invalid login credentials' , 'status' => 404]);

    }
    
    public function logout()
    {
        $user =  Auth::user();
        $user->tokens()->delete();
        return response(['staus' => 200 , 'message' => 'user logout']);
    }
}
