<?php

namespace API\Repositories;

use API\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

final class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function show($id)
    {
        try {
            $user = $this->user->findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['status' => 'fail', 'data' => ['SQLSTATE' => $e->getMessage()]], 400);
        }
        if (count($user) === 0) {
            return response()->json(['message' => 'error'], 404);
        }
        return response()->json(['status' => 'success', 'data' => ['user' => $user]], 200);
    }

    public function store($request)
    {
        try {
            $data = $request->only('first_name', 'last_name', 'email', 'password');
            $data['password'] = Hash::make($data['password']);
            $this->user->create($data);
        } catch (QueryException $e) {
            return response()->json(['status' => 'fail', 'data' => ['SQLSTATE' => $e->getCode()]], 400);
        }
        return response()->json(['message' => 'success'], 201);
    }

    public function update($request, $id)
    {
        try {
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            $user = $this->user->findOrFail($id);
            $user->fill($data)->save();
        } catch (ModelNotFoundException $e) {
            return response()->json(['status' => 'fail', 'data' => ['SQLSTATE' => $e->getMessage()]], 400);
        }
        return response()->json(['message' => 'success'], 200);
    }

    public function delete($id)
    {
        try {
            $user = $this->user->findOrFail($id);
            $user->delete();
        } catch (ModelNotFoundException $e) {
            return response()->json(['status' => 'fail', 'data' => ['SQLSTATE' => $e->getMessage()]], 404);
        }
        return response()->json(['message' => 'success'], 200);
    }
}