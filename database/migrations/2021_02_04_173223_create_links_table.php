<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('links', function (Blueprint $table) {
      $table->increments('id');

      $table->integer('link_type_id')->unsigned();
      $table->foreign('link_type_id')
        ->references('id')
        ->on('link_types');

      $table->integer('learning_object_id')->unsigned();
      $table->foreign('learning_object_id')
        ->references('id')
        ->on('learning_objects');

      $table->string('url');

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
    Schema::dropIfExists('links');
  }
}
