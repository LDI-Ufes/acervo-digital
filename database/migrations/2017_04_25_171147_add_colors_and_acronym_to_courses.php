<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColorsAndAcronymToCourses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::table('courses', function (Blueprint $table) {
		    $table->string('bg_color');
		    $table->string('fg_color');
		    $table->char('acronym', 3);
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
		$table->dropColumn(['bg_color','fg_color','acronym']);
        });
    }
}
