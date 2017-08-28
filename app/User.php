<?php

namespace API;

use API\Traits\UuidTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use UuidTrait;

    protected $table = 'user';
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'uuid', 'first_name', 'last_name', 'email', 'password'
    ];

    protected $hidden = [
        'password',
    ];

    public function workoutPlan()
    {
        return $this->hasMany('API\WorkoutPlan');
    }
}