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
    $columnExists = Schema::hasColumn('learning_objects', 'course_id');

    if ($columnExists) {
      Schema::table('learning_objects', function (Blueprint $table) {
        $table->dropForeign('learning_objects_course_id_foreign'); // Excluindo a referência da chave estrangeira
        $table->dropColumn('course_id');
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
    $columnExists = Schema::hasColumn('learning_objects', 'course_id');

    if (!$columnExists) {
      Schema::table('learning_objects', function (Blueprint $table) {
        $table->integer('course_id')->unsigned();
        $table->foreign('course_id')->references('id')->on('courses'); // Estava dando problema. Resolvido.
      });
    }
  }
}
