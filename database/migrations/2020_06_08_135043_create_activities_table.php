<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('activities', function (Blueprint $table) {
      $table->id();
      $table->uuid('act_uuid')->index();
      $table->integer('t_id');
      $table->string('quiz_title');
      $table->longtext('quiz_desc');
      $table->string('quiz_type')->nullable();
      $table->integer('quiz_item')->nullable();
      $table->integer('passing_score')->nullable();
      $table->integer('time_limit')->nullable();
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
    Schema::dropIfExists('activities');
  }
}
