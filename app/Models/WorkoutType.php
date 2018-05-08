<?php

namespace API\Models;

use API\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkoutType extends Model
{
    use UuidTrait;
    use SoftDeletes;

    protected $table = 'workout_type';
    protected $primaryKey = 'workout_type_id';

    protected $fillable = [
        'uuid', 'workout_plan_id', 'name', 'description'
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function workoutPlan()
    {
        return $this->belongsTo(WorkoutPlan::class, 'workout_plan_id');
    }
}
