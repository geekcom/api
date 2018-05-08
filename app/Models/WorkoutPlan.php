<?php

namespace API\Models;

use API\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkoutPlan extends Model
{
    use UuidTrait;
    use SoftDeletes;

    protected $table = 'workout_plan';
    protected $primaryKey = 'workout_plan_id';

    protected $fillable = [
        'uuid', 'user_id'
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function workoutType()
    {
        return $this->hasMany(WorkoutType::class, 'workout_plan_id');
    }

}