<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'email|required',
                'password' => 'required',
            ]);
            $credentials = request(['email', 'password']);
            if (!Auth::attempt($credentials)) {
                return ResponseFormatter::error(
                    [
                        'message' => 'Unathorized'
                    ],
                    "Authentication Failed",
                    500
                );
            }
            $user = User::where('email', $request->email)->first();
            if (!Hash::check($request->password, $user->password, [])) {
                throw new Exception("Invalid Credentials");
            }

            $token = $user->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success([
                'access_token' => $token,
                'token_type' => 'Barier',
                'user' => $user
            ], 'Authenticated');
        } catch (Exception $error) {
            return ResponseFormatter::error(
                [
                    'message' => "Something Went Wrong",
                    'error' => $error,
                ],
                'Authenticated Failed',
                500
            );
        }
    }
    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => ['string', 'required', 'max:255'],
                'email' => ['string', 'required', 'max:255', 'unique:users'],
                'phone_number' => ['string', 'nullable', 'max:255'],
                'password' => ['string', 'required'],
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'password' => Hash::make($request->password),
            ]);

            $user = User::where('email', $request->email)->first();

            $tokenRes = $user->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success(
                [
                    'access_token' => $tokenRes,
                    'token_type' => 'Bearer',
                    'user' => $user
                ],
                'User Registered'
            );
        } catch (Exception $error) {
            return ResponseFormatter::error(
                [
                    'message' => 'Something Went Wrong',
                    'error' => $error
                ],
                'Authentication Failed',
                500
            );
        }
    }
}
