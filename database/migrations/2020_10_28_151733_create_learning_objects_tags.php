<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLearningObjectsTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learning_objects_tags', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('learning_object_id')->unsigned();
            $table->foreign('learning_object_id')
              ->references('id')
              ->on('learning_objects')
              ->onDelete('cascade');

            $table->integer('tag_id')->unsigned();
            $table->foreign('tag_id')
              ->references('id')
              ->on('tags')
              ->onDelete('cascade');

            $table->timestamps();

            $table->unique(['learning_object_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('learning_objects_tags');
    }
}
