<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(Request $request, $lang)
    {
        $validation = Validator::make($request->all(), [
            'eid' => 'required|string|max:255',
            'moblie' => 'required|string',
        ]);
        if ($validation->fails()) {
            return response()->json(['success' => false, 'errors' => $validation->errors()], 400);
        }
        $message = "";

        $token_validity = 24 * 60;

        $this->guard()->factory()->setTTL($token_validity);

        if (!$token = $this->guard()->attempt([
            'email' => $request->input('eid'),
            'password' => $request->input('moblie'),
        ])) {
            if ($lang == "ar") {
                $message = "أوراق الاعتماد هذه لا تتطابق مع سجلاتنا.";
            } else {
                $message = "These credentials do not match our records.";
            }
            return response()->json(["success" => false, "message" => $message], 401);
        }
        $user = $this->guard()->user();
        if ($user->active == 0) {
            $this->guard()->logout();
            if ($lang == "ar") {
                $message = "المستخدم لا ينشط.";
            } else {
                $message = "User not activate.";
            }

            return response()->json([
                "success" => false,
                "message" => $message,
            ], 401);
        }
        if ($lang == "ar") {
            $message = "تم تسجيل الدخول بنجاح.";
        } else {
            $message = "Successfully logged in.";
        }
        return response()->json([
            "success" => true,
            "message" => $message,
            "data" => [
                'token' => $token,
                'token_type' => 'bearer',
                'expires_in' => $this->guard()->factory()->getTTL() * 60,
                'user' => [
                    "id" => $user->id,
                    "name" => $user->name,
                    "profile_photo_path" => $user->profile_photo_path,
                    "eid" => $user->email,
                    "moblie" => $user->moblie,
                    "passport" => $user->passport,
                ],
            ],
        ]);
    }

    public function logout($lang)
    {
        $this->guard()->logout();
        if ($lang == "ar") {
            $message = "تم تسجيل خروج المستخدم بنجاح.";
        } else {
            $message = "User logged out successfully.";
        }

        return response()->json([
            "success" => true,
            "message" => $message,
        ]);
    }

    public function guard()
    {
        return Auth::guard('api');
    }
}