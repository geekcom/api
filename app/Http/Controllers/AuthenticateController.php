<?php

namespace API\Http\Controllers;

use API\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Support\Facades\Hash;

class AuthenticateController extends Controller
{
    protected $JWTAuth;

    public function __construct(JWTAuth $JWTAuth)
    {
        $this->JWTAuth = $JWTAuth;
    }

    public function authJWT(Request $request)
    {
        $data = $request->only('email', 'password');

        $user = User::where('email', $data['email'])->first();

        if ($user && Hash::check($data['password'], $user->password)) {
            $token = $this->JWTAuth->fromUser($user);
            return response()->json(['message' => 'success','token' => $token, 'user' => $user], 200);
        }

        return response()->json(['message' => 'error'], 500);
    }
}
