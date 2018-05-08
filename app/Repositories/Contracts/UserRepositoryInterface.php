<?php

namespace API\Repositories\Contracts;

interface UserRepositoryInterface
{
    public function show($uuid);

    public function store($request);

    public function update($request, $uuid);

    public function delete($uuid);

}