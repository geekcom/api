<?php

namespace API;

use API\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;

class WorkoutType extends Model
{
    use UuidTrait;

    protected $table = 'workout_type';
    protected $primaryKey = 'id_workout_type';

    protected $fillable = [
        'uuid', 'name', 'description'
    ];

    public function workoutPlan()
    {
        return $this->hasMany('API\WorkoutPlan');
    }
}
