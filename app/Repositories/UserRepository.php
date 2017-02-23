<?php

namespace API\Repositories;

use API\Repositories\Contracts\UserRepositoryInterface;
use API\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function show($id)
    {
        $user = $this->model->find($id);
        return $user;
    }

    public function store($request)
    {
        $data = $request->only('name', 'email', 'password');
        $data['password'] = Hash::make($data['password']);

        $user = $this->model->create($data);

        if ($user) {
            return response()->json(['message' => 'success'], 200);
        }
        return response()->json(['message' => 'error'], 500);
    }

    public function update($request, $id)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        $user = $this->model->findOrFail($id);

        $user->fill($data)->save();

        if ($user) {
            return response()->json(['message' => 'success'], 200);
        }
        return response()->json(['message' => 'error'], 500);
    }

    public function delete($id)
    {
        $user = $this->model->findOrFail($id);

        $user->delete();

        if ($user) {
            return response()->json(['message' => 'success'], 200);
        }
        return response()->json(['message' => 'error'], 500);
    }
}