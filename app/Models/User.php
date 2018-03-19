<?php

namespace API\Models;

use API\Traits\UuidTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use UuidTrait;
    use SoftDeletes;

    protected $table = 'user';
    protected $primaryKey = 'id';

    protected $fillable = [
        'uuid', 'first_name', 'last_name', 'email', 'password'
    ];

    protected $hidden = [
        'password',
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function workoutPlan()
    {
        return $this->hasMany('API\Models\WorkoutPlan');
    }
}