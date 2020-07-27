<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('subjects', function (Blueprint $table) {
      $table->id();
      $table->uuid('s_uuid')->index();
      $table->integer('uploader_id');
      $table->string('grade');
      $table->string('subject');
      $table->integer('status')->nullable();
      $table->longtext('description')->nullable();
      $table->text('photo')->nullable();
      $table->softDeletes('deleted_at', 0);
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
    Schema::dropIfExists('subjects');
  }
}
