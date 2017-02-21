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
            $table->increments('id_workout_plan');

            $table->integer('fk_workout_type')->unsigned();
            $table->foreign('fk_workout_type')->references('id_workout_type')->on('workout_type');

            $table->integer('fk_user')->unsigned();
            $table->foreign('fk_user')->references('id_user')->on('user');

            $table->dateTime('date');
            $table->timestamps();
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
