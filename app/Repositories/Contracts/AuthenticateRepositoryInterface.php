<?php

namespace API\Repositories\Contracts;

interface AuthenticateRepositoryInterface
{
    public function authJwt($request);
}