<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|void
     * @author aldiasyah <aldiansyahrpl2@gmail.com>
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            "email" => $request->email,
            "password" => $request->password
        ];

        if(Auth::attempt($credentials)) {
            try{
                $record = Auth::user();
                $token = $record->createToken('SsoToken')->accessToken;

                $result = [
                    'token' => $token,
                    'user' => User::where('id', auth()->user()->id)->first()
                ];

            } catch (\Exception $ex){
                Log::error("Internal Server Error", ['message' => $ex->getMessage()]);
            }

            return response()->json([
                'message' => 'Login Berhasil',
                'status' => 200,
                'data' => $result
            ], 200);
        }else{
            return response()->json([
                'message' => 'Username/Password Salah',
                'status' => 401
            ], 401);
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @author aldiasyah <aldiansyahrpl2@gmail.com>
     */
    public function logout()
    {
        $record = Auth::user();
        $record->tokens->each(function ($token, $key){
            $token->delete();
        });

        return response()->json([
            'message' => 'Logout Berhasil',
            'status' => 200
        ], 200);
    }
}
