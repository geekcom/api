<?php

namespace API\Http\Controllers;

use API\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(UserRepositoryInterface $repository, Request $request, $id)
    {
        return $repository->show($request, $id);
    }

    public function store(UserRepositoryInterface $repository, Request $request)
    {
        return $repository->store($request);
    }

    public function update(UserRepositoryInterface $repository, Request $request, $id)
    {
        return $repository->update($request, $id);
    }

    public function delete(UserRepositoryInterface $repository, Request $request, $id)
    {
        return $repository->delete($request, $id);
    }
}
