<?php

namespace API;

use API\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;

class WorkoutPlan extends Model
{
    use UuidTrait;

    protected $table = 'workout_plan';
    protected $primaryKey = 'id_workout_plan';

    protected $fillable = [
        'uuid', 'fk_workout_type', 'fk_user', 'date'
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