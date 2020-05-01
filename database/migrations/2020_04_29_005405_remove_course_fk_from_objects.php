<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveCourseFkFromObjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('learning_objects', function (Blueprint $table) {
        // $table->dropForeign('courses_learning_objects_id_foreign'); <- fallback
        // $table->dropForeign(['course_id']); maybe we don't need to drop it, dunno.
        $table->dropColumn('course_id');
      });
    }

    /**R
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('learning_objects', function(Blueprint $table) {
        $table->integer('course_id')->unsigned();
        $table->foreign('course_id')->reference('id')->on('courses');
      });
    }
}
