<?php

namespace API\Repositories;

use API\Repositories\Contracts\AuthenticateRepositoryInterface;
use API\User;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Support\Facades\Hash;

class AuthenticateRepository implements AuthenticateRepositoryInterface
{
    protected $model;
    protected $JWTAuth;

    public function __construct(User $model, JWTAuth $JWTAuth)
    {
        $this->model = $model;
        $this->JWTAuth = $JWTAuth;
    }

    public function authJWT($request)
    {
        $data = $request->only('email', 'password');

        $user = $this->model->where('email', $data['email'])->first();

        if (count($user) > 0 && Hash::check($data['password'], $user->password)) {
            $token = $this->JWTAuth->fromUser($user);
            return response()->json(['status' => 'success', 'data' => ['token' => $token]], 200);
        }

        return response()->json(['status' => 'fail', 'data' => ['email' => 'email is required', 'password' => 'password is required']], 401);
    }

}