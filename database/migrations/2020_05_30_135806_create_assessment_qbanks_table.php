<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentQbanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessment_qbanks', function (Blueprint $table) {
            $table->id();
            $table->uuid('q_uuid')->index();
            $table->integer('sa_uuid');
            $table->integer('sa_id');
            $table->string('q_type')->nullable();
            $table->longtext('question')->nullable();
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
        Schema::dropIfExists('assessment_qbanks');
    }
}
