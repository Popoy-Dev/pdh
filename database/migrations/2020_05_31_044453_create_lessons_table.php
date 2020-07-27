<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('lessons', function (Blueprint $table) {
      $table->id();
      $table->uuid('l_uuid')->index();
      $table->integer('inst_id');
      $table->string('lesson_title');
      $table->integer('sort')->default(0);
      $table->softDeletes('deleted_at',0);
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
    Schema::dropIfExists('lessons');
  }
}
