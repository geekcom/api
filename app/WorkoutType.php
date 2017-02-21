<?php

namespace API;

use Illuminate\Database\Eloquent\Model;

class WorkoutType extends Model
{
    protected $table = 'workout_type';
    protected $primaryKey = 'id_workout_type';

    protected $fillable = [
        'fk_workout_type', 'fk_user', 'date'
    ];

    public function workoutPlan()
    {
        return $this->hasMany('API\WorkoutPlan');
    }
}
