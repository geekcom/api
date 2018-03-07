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
    protected $primaryKey = 'id';

    protected $fillable = [
        'uuid', 'fk_workout_type', 'fk_user'
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function user()
    {
        return $this->belongsTo('API\Models\User', 'fk_user');
    }

    public function workoutType()
    {
        return $this->belongsTo('API\Models\WorkoutType', 'fk_workout_type');
    }

}