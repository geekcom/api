<?php

namespace API\Repositories;

use API\Repositories\Contracts\WorkoutPlanRepositoryInterface;
use API\WorkoutPlan;

class WorkoutPlanRepository implements WorkoutPlanRepositoryInterface
{
    protected $model;

    public function __construct(WorkoutPlan $model)
    {
        $this->model = $model;
    }

    public function show($id)
    {
        $workoutPlan = $this->model->findOrFail($id);
        return response()->json(['status' => 'success', 'data' => ['workoutPlan' => $workoutPlan]], 200);
    }

    public function store($request)
    {
        $data = $request->only('fk_workout_type', 'fk_user', 'date');

        $workoutPlan = $this->model->create($data);

        if ($workoutPlan) {
            return response()->json(['message' => 'success'], 200);
        }
        return response()->json(['message' => 'error'], 500);
    }

    public function update($request, $id)
    {
        $data = $request->all();

        $workoutPlan = $this->model->findOrFail($id);
        $workoutPlan->fill($data)->save();

        if ($workoutPlan) {
            return response()->json(['message' => 'success'], 200);
        }
        return response()->json(['message' => 'error'], 500);
    }

    public function delete($id)
    {
        $workoutPlan = $this->model->findOrFail($id);

        $workoutPlan->delete();

        if ($workoutPlan) {
            return response()->json(['message' => 'success'], 200);
        }
        return response()->json(['message' => 'error'], 500);
    }
}