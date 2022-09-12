<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    /**
     * login with valid credentials
     *
     * @param  Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required|min:5',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $message = "Welcome User....";

        try {
            if (!$token = auth()->attempt($validator->validated())) {
                return response()->json(['status' => 'error', 'message' => 'Please provide a valid credentials..'], 401);
            }
            if (auth()->user()->role_id == 1) {
                $message = "Welcome Admin....";
            }
            return response()->json(['status' => 'success', 'message' => $message, 'token' => $token], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }


    /**
     * Refresh token
     * @return \Illuminate\Http\Response
     */
    public function refreshToken()
    {
        return response()->json([
            'status' => 'success',
            'user'   => Auth::user(),
            'data'   => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }
}
