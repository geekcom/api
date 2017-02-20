<?php

namespace API\Http\Middleware;

use Tymon\JWTAuth\JWTAuth;

class BaseMiddleware
{
    private $JWTAuth;

    public function __construct(JWTAuth $JWTAuth)
    {
        $this->JWTAuth = $JWTAuth;
    }

    public function getUserIdAuthenticated()
    {
        return $this->JWTAuth->parseToken()->authenticate()->id_user;
    }
}
