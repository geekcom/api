<?php

namespace API\Repositories;

use API\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

final class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function show($uuid)
    {
        $user = $this->findUserByUuid($uuid);

        if ($user) {
            return response()->json(['status' => 'success', 'data' => ['user' => $user]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function store($request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        $validator = Validator::make($data, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:user',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                'data' => [
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'email' => 'required|unique',
                    'password' => 'required',
                ]], 422);
        }

        $createUser = $this->user->create($data);

        if ($createUser) {
            return response()->json(['status' => 'success'], 201);
        }
        return response()->json(['status' => 'error'], 500);
    }

    public function update($request, $uuid)
    {
        $user = $this->findUserByUuid($uuid);

        if ($user) {

            $data = $request->all();

            if (isset($data['password'])) {
                $data['password'] = Hash::make($data['password']);
            }

            $validator = Validator::make($data, [
                'first_name' => 'sometimes|required',
                'last_name' => 'sometimes|required',
                'email' => [
                    'sometimes',
                    'required',
                    Rule::unique('user')->ignore($uuid, 'uuid'),
                ],
                'password' => 'sometimes|required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'fail',
                    'data' => [
                        'first_name' => 'required',
                        'last_name' => 'required',
                        'email' => 'required|unique_key',
                        'password' => 'required',
                    ]], 422);
            }

            $user->update($data);

            return response()->json(['status' => 'success'], 200);
        }

        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function delete($uuid)
    {
        $user = $this->findUserByUuid($uuid);

        if ($user) {
            $user->delete();
            return response()->json(['status' => 'success', 'data' => null], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    private function findUserByUuid($uuid)
    {
        return $this->user
            ->where('uuid', $uuid)
            ->first();

    }
}