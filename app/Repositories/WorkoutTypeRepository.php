<?php

namespace API\Repositories;

use API\Repositories\Contracts\WorkoutTypeRepositoryInterface;
use Illuminate\Support\Facades\Validator;

final class WorkoutTypeRepository extends BaseRepository implements WorkoutTypeRepositoryInterface
{
    public function show($uuid)
    {
        $workoutType = $this->findWorkoutTypeByUuid($uuid);

        if ($workoutType) {
            return response()->json(['status' => 'success', 'data' => ['workoutType' => $workoutType]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function store($request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                'data' => [
                    'name' => 'required',
                    'description' => 'required',
                ]], 422);
        }

        $workoutType = $this->workoutType->create($data);

        if ($workoutType) {
            return response()->json(['status' => 'success'], 201);
        }
        return response()->json(['status' => 'error'], 500);
    }

    public function update($request, $uuid)
    {
        $workoutType = $this->findWorkoutTypeByUuid($uuid);

        if ($workoutType) {

            $data = $request->all();

            $validator = Validator::make($data, [
                'name' => 'sometimes|required',
                'description' => 'sometimes|required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'fail',
                    'data' => [
                        'name' => 'required',
                        'description' => 'required',
                    ]], 422);
            }

            $workoutType->update($data);

            return response()->json(['status' => 'success'], 200);
        }

        return response()->json(['status' => 'error'], 500);
    }

    public function delete($id)
    {
        $workoutType = $this->workoutType->find($id);

        if ($workoutType) {
            $workoutType->delete();
            return response()->json(['status' => 'success', 'data' => null], 200);
        }
        return response()->json(['status' => 'error'], 404);
    }

    private function findWorkoutTypeByUuid($uuid)
    {
        return $this->workoutType
            ->where('uuid', $uuid)
            ->first();

    }
}