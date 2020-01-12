<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function register (Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required|max:55',
            'email'=>'email|required|unique:users',
            'password'=>'required|confirmed'
        ]);

        $validatedData['password']= bcrypt($validatedData['password']);
        $user = User::create($validatedData);
        
        // $user->password = bcrypt($user->password); 

        $accessToken = $user->createToken('authToken')->accessToken;

        return response(['user'=> $user, 'access_token' => $accessToken]);
    }

    public function login (Request $request)
    {
        $validatedData = $request->validate([
            'email'=>'email|required',
            'password'=>'required'
        ]);
        // dd($validatedData);

        if(!auth()->attempt($validatedData)){
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response(['user'=> auth()->user(), 'access_token' => $accessToken]);
    }
}
