<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {

        $credetials = $request->all();

        $validator = Validator::make($credetials, [
            'email' => 'required',
            'password' => 'required',
        ]);

        // if validation fail
        if ($validator->fails()) {
            return response()->json(
                [
                    'errors' => $validator->errors(),
                ], 422);
        }

        // if user is not wrong
        $accessToken = Auth::attempt($credetials);
        if (!$accessToken) {
            return response()->json(
                [
                    'error' => 'Unauthorized',
                ], 422);
        }

        return response()->json(
            [
                "status" => "success",
                "user" => auth()->user(),
                "authorization" => [
                    "token" => $accessToken,
                    "type" => "bearer",
                ],
            ], 200);
    }

    public function logout()
    {
        Auth::logout();

        return response()->json(
            [
                "status" => "success",
                "message" => "successfully logged out",
            ], 200);
    }
}
