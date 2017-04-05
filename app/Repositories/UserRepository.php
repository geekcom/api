<?php

namespace API\Repositories;

use API\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Exception;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function show($id)
    {
        $user = $this->user->findOrFail($id);

        if (count($user) === 0) {
            return response()->json(['message' => 'error'], 205);
        }
        return response()->json(['status' => 'success', 'data' => ['user' => $user]], 200);
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {
            $data = $request->only('first_name', 'last_name', 'email', 'password');
            $data['password'] = Hash::make($data['password']);
            $user = $this->user->create($data);
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();

        if ($user) {
            return response()->json(['message' => 'success'], 200);
        }
        return response()->json(['message' => 'error'], 500);
    }

    public function update($request, $id)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        $user = $this->user->findOrFail($id);

        $user->fill($data)->save();

        if ($user) {
            return response()->json(['message' => 'success'], 200);
        }
        return response()->json(['message' => 'error'], 500);
    }

    public function delete($id)
    {
        $user = $this->user->findOrFail($id);

        $user->delete();

        if ($user) {
            return response()->json(['message' => 'success'], 200);
        }
        return response()->json(['message' => 'error'], 500);
    }
}