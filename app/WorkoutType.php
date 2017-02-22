<?php

namespace API;

use Illuminate\Database\Eloquent\Model;

class WorkoutType extends Model
{
    protected $table = 'workout_type';
    protected $primaryKey = 'id_workout_type';

    protected $fillable = [
        'name', 'description'
    ];

    public function workoutPlan()
    {
        return $this->hasMany('API\WorkoutPlan');
    }
}
