<?php

namespace API;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password'
    ];

    protected $hidden = [
        'password',
    ];

    public function workoutPlan()
    {
        return $this->hasMany('API\WorkoutPlan');
    }
}