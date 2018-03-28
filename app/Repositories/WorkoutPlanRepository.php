<?php

namespace API\Repositories;

use API\Repositories\Contracts\WorkoutPlanRepositoryInterface;
use Illuminate\Support\Facades\Validator;

final class WorkoutPlanRepository extends BaseRepository implements WorkoutPlanRepositoryInterface
{
    public function workoutPlanByUser($id)
    {
        $workoutPlansByUser = $this->workoutPlan
            ->where('user_id', $id)
            ->with('workoutType')
            ->get();

        if ($workoutPlansByUser) {
            return response()->json(['status' => 'success', 'data' => ['workoutPlanByUser' => $workoutPlansByUser]], 200);
        }
        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function store($request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                'data' => [
                    'user_id' => 'required',
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
                'user_id' => 'sometimes|required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'fail',
                    'data' => [
                        'user_id' => 'required',
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