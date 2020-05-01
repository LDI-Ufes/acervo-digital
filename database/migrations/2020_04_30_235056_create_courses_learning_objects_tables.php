<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesLearningObjectsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('courses_learning_objects', function(Blueprint $table) {
        $table->increments('id');

        $table->integer('learning_object_id')->unsigned();
        $table->foreign('learning_object_id')
          ->references('id')
          ->on('learning_objects')
          ->onDelete('cascade');

        $table->integer('course_id')->unsigned();
        $table->foreign('course_id')
          ->references('id')
          ->on('courses')
          ->onDelete('cascade');

        $table->timestamps();

        $table->unique(['learning_object_id', 'course_id']);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('courses_learning_objects');
    }
}
