<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	if (!Schema::hasTable('books')) {
		Schema::create('books', function(Blueprint $table){
			$table->increments('id');

			$table->integer('course_id')->unsigned();
			$table->foreign('course_id')->reference('id')->on('courses');

			$table->string('title');
			$table->string('author');		
			$table->text('summary');
			$table->string('cover')->default('default.jpg'); //criar essa default aqui
			$table->string('pdf'); // vai ser só o link, uploado ou os dois??
			$table->integer('module');
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
        Schema::dropIfExists('books');
    }
}
