<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLearningObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	if (!Schema::hasTable('learning_objects')) {
		Schema::create('learning_objects', function(Blueprint $table){
			$table->increments('id');

			$table->integer('course_id')->unsigned();
			$table->foreign('course_id')->reference('id')->on('courses');

			$table->integer('type_id')->unsigned();
			$table->foreign('type_id')->reference('id')->on('object_types');

			$table->integer('module');

			$table->string('title');
			$table->string('author');		
			$table->text('summary');
			$table->string('cover')->default('_default.jpg'); 
			$table->string('link'); 

			$table->timestamps();
		});
	}
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('learning_objects');
    }
}
