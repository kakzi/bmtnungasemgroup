<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Office;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username'     => 'required',
            'password'  => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Username dan Password tidak di temukan!',
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        $id = $user->office_id;
        $office = Office::where('id', $id)->first();

        return response()->json([
            'message' => 'success',
            'data' => $user,
            'meta' => [
                'token' => $token
            ],
            'office' => $office
        ], 200);
    }

    // method for user logout and delete token
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ];
    }
}
