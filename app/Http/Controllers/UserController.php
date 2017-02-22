<?php

namespace API\Http\Controllers;

use API\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function store(Request $request)
    {
        $data = $request->only('name', 'email', 'password');
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        if ($user) {
            return response()->json(['message' => 'success'], 200);
        }
        return response()->json(['message' => 'error'], 500);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        $user = User::findOrFail($id);
        $user->fill($data)->save();

        if ($user) {
            return response()->json(['message' => 'success'], 200);
        }
        return response()->json(['message' => 'error'], 500);
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        if ($user) {
            return response()->json(['message' => 'success'], 200);
        }
        return response()->json(['message' => 'error'], 500);
    }
}
