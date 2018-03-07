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
    protected $primaryKey = 'id';

    protected $fillable = [
        'uuid', 'name', 'description'
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function workoutPlan()
    {
        return $this->hasMany('API\Models\WorkoutPlan');
    }
}
