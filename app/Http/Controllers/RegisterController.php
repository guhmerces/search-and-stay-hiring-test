<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
        $validated = $request->validated();

        User::create($validated);

        return response('', 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return response([
                "data" => [
                    "token" => $user->createToken('App')->plainTextToken,
                ]
            ]);
        }

        abort(401, 'Invalid Credentials');
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();
    }
}
