<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkoutPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workout_plan', function (Blueprint $table) {
            $table->bigIncrements('workout_plan_id');
            $table->uuid('uuid');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('user_id')->on('user');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('workout_plan');
    }
}