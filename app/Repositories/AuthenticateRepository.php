<?php

namespace API\Repositories;

use API\Repositories\Contracts\AuthenticateRepositoryInterface;
use Illuminate\Support\Facades\Hash;

final class AuthenticateRepository extends BaseRepository implements AuthenticateRepositoryInterface
{
    public function authJWT($request)
    {
        $data = $request->only('email', 'password');

        $user = $this->user->where('email', $data['email'])->first();

        if ($user && Hash::check($data['password'], $user->password)) {
            $token = $this->JWTAuth->fromUser($user);
            return response()->json(['status' => 'success', 'data' => ['token' => $token]], 200);
        }

        return response()->json(['status' => 'fail', 'data' => ['email' => 'email is required', 'password' => 'password is required']], 401);
    }

}