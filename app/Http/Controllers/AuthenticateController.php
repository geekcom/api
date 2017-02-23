<?php

namespace API\Http\Controllers;

use API\Repositories\Contracts\AuthenticateRepositoryInterface;
use Illuminate\Http\Request;

class AuthenticateController extends Controller
{
    public function authJwt(AuthenticateRepositoryInterface $repository, Request $request)
    {
        return $repository->authJwt($request);
    }
}
