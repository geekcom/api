<?php

namespace API\Repositories;

use Tymon\JWTAuth\JWTAuth;
use API\Models\User;
use API\Models\WorkoutType;
use API\Models\WorkoutPlan;

class BaseRepository
{
    protected $JWTAuth;
    protected $user;
    protected $workoutType;
    protected $workoutPlan;

    public function __construct(JWTAuth $JWTAuth, User $user, WorkoutType $workoutType, WorkoutPlan $workoutPlan)
    {
        $this->JWTAuth = $JWTAuth;
        $this->user = $user;
        $this->workoutType = $workoutType;
        $this->workoutPlan = $workoutPlan;
    }
}