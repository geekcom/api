<?php

namespace API\Repositories;

use API\Repositories\Contracts\WorkoutTypeRepositoryInterface;
use API\WorkoutType;

class WorkoutTypeRepository implements WorkoutTypeRepositoryInterface
{
    protected $model;

    public function __construct(WorkoutType $model)
    {
        $this->model = $model;
    }

    public function listAll()
    {
        $workoutType = $this->model->all();
        return response()->json(['status' => 'success', 'data' => ['workoutType' => $workoutType]], 200);
    }

    public function store($request)
    {
        $data = $request->only('name', 'description');

        $workoutType = $this->model->create($data);

        if ($workoutType) {
            return response()->json(['message' => 'success'], 200);
        }
        return response()->json(['message' => 'error'], 500);
    }

    public function update($request, $id)
    {
        $data = $request->all();

        $workoutType = $this->model->findOrFail($id);
        $workoutType->fill($data)->save();

        if ($workoutType) {
            return response()->json(['message' => 'success'], 200);
        }
        return response()->json(['message' => 'error'], 500);
    }

    public function delete($id)
    {
        $workoutType = $this->model->findOrFail($id);

        $workoutType->delete();

        if ($workoutType) {
            return response()->json(['message' => 'success'], 200);
        }
        return response()->json(['message' => 'error'], 500);
    }
}