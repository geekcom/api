<?php

namespace API\Repositories;

use API\Repositories\Contracts\WorkoutPlanRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Validator;

final class WorkoutPlanRepository extends BaseRepository implements WorkoutPlanRepositoryInterface
{
    public function workoutPlanByUser($id)
    {
        $workoutPlansByUser = DB::table('workout_plan AS wkP')
            ->join('workout_type AS wkT', 'wkT.id', '=', 'wkP.fk_workout_type')
            ->join('user AS u', 'wkP.fk_user', '=', 'u.id')
            ->where('wkP.fk_user', $id)
            ->select('wkP.id', 'wkP.uuid', 'u.first_name as user_name', 'u.email AS user_email',
                'wkT.name AS workout_type', 'wkT.description AS workout_type_description')
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
                ]], 400);
        }

        $workoutPlan = $this->workoutPlan->create($data);

        if (count($workoutPlan) > 0) {
            return response()->json(['status' => 'success'], 201);
        }
        return response()->json(['status' => 'error'], 500);
    }

    public function update($request, $id)
    {
        $workoutPlan = $this->workoutPlan->find($id);

        if (count($workoutPlan) > 0) {

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
                    ]], 400);
            }

            $workoutPlan->fill($data)->save();

            return response()->json(['status' => 'success'], 200);
        }

        return response()->json(['status' => 'error'], 500);
    }

    public function delete($id)
    {
        $workoutPlan = $this->workoutPlan->find($id);

        if (count($workoutPlan) > 0) {
            $workoutPlan->delete();
            return response()->json(['status' => 'success', 'data' => null], 200);
        }

        return response()->json(['status' => 'error'], 500);
    }
}