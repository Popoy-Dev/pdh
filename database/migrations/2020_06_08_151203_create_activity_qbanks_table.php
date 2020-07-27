<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityQbanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_qbanks', function (Blueprint $table) {
            $table->id();
            $table->uuid('aq_uuid')->index();
            $table->integer('act_id');
            $table->longtext('question');
            $table->string('quiz_type')->nullable();
            $table->integer('points')->nullable();
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
        Schema::dropIfExists('activity_qbanks');
    }
}
