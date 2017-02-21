<?php

namespace API;

use Illuminate\Database\Eloquent\Model;

class WorkoutPlan extends Model
{
    protected $table = 'workout_plan';
    protected $primaryKey = 'id_workout_plan';

    protected $fillable = [
        'name', 'description'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function workoutType()
    {
        return $this->belongsTo('App\WorkoutType');
    }
}
