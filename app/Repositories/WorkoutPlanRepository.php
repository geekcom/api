<?php

namespace API\Repositories;

use API\Repositories\Contracts\WorkoutPlanRepositoryInterface;
use API\WorkoutPlan;
use Illuminate\Support\Facades\Validator;

final class WorkoutPlanRepository extends BaseRepository implements WorkoutPlanRepositoryInterface
{
    public function workoutPlanByUser($id)
    {
        $workoutPlansByUser = WorkoutPlan::with('user', 'workoutType')
            ->where('fk_user', $id)
            ->get();

        if (count($workoutPlansByUser) > 0) {
            return response()->json(['status' => 'success', 'data' => ['workoutPlanByUser' => $workoutPlansByUser]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function store($request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'fk_workout_type' => 'required',
            'fk_user' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                'data' => [
                    'fk_workout_type' => 'required',
                    'fk_user' => 'required',
                ]], 422);
        }

        $createWorkoutPlan = $this->workoutPlan->create($data);

        if ($createWorkoutPlan) {
            return response()->json(['status' => 'success'], 201);
        }
        return response()->json(['status' => 'error'], 500);
    }

    public function update($request, $id)
    {
        $workoutPlan = $this->workoutPlan->find($id);

        if ($workoutPlan) {

            $data = $request->all();

            $validator = Validator::make($data, [
                'fk_workout_type' => 'sometimes|required',
                'fk_user' => 'sometimes|required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'fail',
                    'data' => [
                        'fk_workout_type' => 'required',
                        'fk_user' => 'required',
                    ]], 422);
            }

            $workoutPlan->fill($data)->save();

            return response()->json(['status' => 'success'], 200);
        }

        return response()->json(['status' => 'error'], 500);
    }

    public function delete($id)
    {
        $workoutPlan = $this->workoutPlan->find($id);

        if ($workoutPlan) {
            $workoutPlan->delete();
            return response()->json(['status' => 'success', 'data' => null], 200);
        }

        return response()->json(['status' => 'error'], 500);
    }
}