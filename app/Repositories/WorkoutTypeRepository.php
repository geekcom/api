<?php

namespace API\Repositories;

use API\Repositories\Contracts\WorkoutTypeRepositoryInterface;

final class WorkoutTypeRepository extends BaseRepository implements WorkoutTypeRepositoryInterface
{
    public function show($id)
    {
        $workoutType = $this->workoutType->findOrFail($id);

        return response()->json(['status' => 'success', 'data' => ['workoutType' => $workoutType]], 200);
    }

    public function store($request)
    {
        $data = $request->only('name', 'description');

        $workoutType = $this->workoutType->create($data);

        if ($workoutType) {
            return response()->json(['message' => 'success'], 200);
        }
        return response()->json(['message' => 'error'], 500);
    }

    public function update($request, $id)
    {
        $data = $request->all();

        $workoutType = $this->workoutType->findOrFail($id);
        $workoutType->fill($data)->save();

        if ($workoutType) {
            return response()->json(['message' => 'success'], 200);
        }
        return response()->json(['message' => 'error'], 500);
    }

    public function delete($id)
    {
        $workoutType = $this->workoutType->findOrFail($id);

        $workoutType->delete();

        if ($workoutType) {
            return response()->json(['message' => 'success'], 200);
        }
        return response()->json(['message' => 'error'], 500);
    }
}