<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiController extends Controller
{
    //user register (POST,formData)

    public function register(Request $request)
    {
        $request->validate([

            "name" => "required",
            "email" => "required|email|unique:users",
            "username" => "required|unique:users",
            "password" => "required"
        ]);

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "username" => $request->username ? $request->username : $request->email,
            "password" => $request->password,
        ]);


        // Response
        return response()->json([
            "status" => true,
            "message" => "User registered successfully"
        ]);

    }

    public function login(Request $request)
    {

        // data validation
        $request->validate([
            "username" => "required",
            "password" => "required"
        ]);

        // JWTAuth
        $token = JWTAuth::attempt([
            "username" => $request->username,
            "password" => $request->password,
        ]);

        if (!empty($token)) {
            return response()->json([
                "status" => true,
                "message" => "User logged in succcessfully",
                "data" => "hello",
                "token" => $token
            ]);
        }

        return response()->json([
            "status" => false,
            "message" => "Invalid details"
        ]);
    }

    public function profile()
    {

        $userdata = auth()->user();

        return response()->json([
            "status" => true,
            "message" => "Profile data",
            "data" => $userdata
        ]);
    }

    public function refreshToken()
    {

        $newToken = auth()->refresh();

        return response()->json([
            "status" => true,
            "message" => "New access token",
            "token" => $newToken
        ]);
    }

    // User Logout (GET)
    public function logout()
    {

        auth()->logout();

        return response()->json([
            "status" => true,
            "message" => "User logged out successfully"
        ]);
    }



}
