<?php

namespace API;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'name', 'email', 'password', 'age', 'weight', 'height'
    ];

    protected $hidden = [
        'password',
    ];

    public function workoutPlan()
    {
        return $this->hasMany('API\WorkoutPlan');
    }
}
