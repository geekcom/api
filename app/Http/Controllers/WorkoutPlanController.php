<?php

namespace API\Http\Controllers;

use API\WorkoutPlan;
use Illuminate\Http\Request;

class WorkoutPlanController extends Controller
{
    public function show($id)
    {
        $workoutPlan = WorkoutPlan::find($id);
        return $workoutPlan;
    }

    public function store(Request $request)
    {
        $data = $request->only('fk_workout_type', 'fk_user', 'date');

        $workoutPlan = WorkoutPlan::create($data);

        if ($workoutPlan) {
            return response()->json(['message' => 'success'], 200);
        }
        return response()->json(['message' => 'error'], 500);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $workoutPlan = WorkoutPlan::findOrFail($id);
        $workoutPlan->fill($data)->save();

        if ($workoutPlan) {
            return response()->json(['message' => 'success'], 200);
        }
        return response()->json(['message' => 'error'], 500);
    }

    public function delete($id)
    {
        $workoutPlan = WorkoutPlan::findOrFail($id);

        $workoutPlan->delete();

        if ($workoutPlan) {
            return response()->json(['message' => 'success'], 200);
        }
        return response()->json(['message' => 'error'], 500);
    }
}
