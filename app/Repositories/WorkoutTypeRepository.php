<?php

namespace API\Repositories;

use API\Repositories\Contracts\WorkoutTypeRepositoryInterface;
use Validator;

final class WorkoutTypeRepository extends BaseRepository implements WorkoutTypeRepositoryInterface
{
    public function show($id)
    {
        $workoutType = $this->workoutType->find($id);

        if (count($workoutType) > 0) {
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
                ]], 400);
        }

        $workoutType = $this->workoutType->create($data);

        if (count($workoutType) > 0) {
            return response()->json(['status' => 'success'], 201);
        }
        return response()->json(['status' => 'error'], 500);
    }

    public function update($request, $id)
    {
        $workoutType = $this->workoutType->find($id);

        if (count($workoutType) > 0) {

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
                    ]], 400);
            }

            $workoutType->fill($data)->save();

            return response()->json(['status' => 'success'], 200);
        }

        return response()->json(['status' => 'error'], 500);
    }

    public function delete($id)
    {
        $workoutType = $this->workoutType->find($id);

        if (count($workoutType) > 0) {
            $workoutType->delete();
            return response()->json(['status' => 'success', 'data' => null], 200);
        }
        return response()->json(['status' => 'error'], 404);
    }
}