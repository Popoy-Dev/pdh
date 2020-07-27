<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentQbanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment_qbanks', function (Blueprint $table) {
            $table->id();
            $table->uuid('assq_uuid')->index();
            $table->integer('ass_id');
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
        Schema::dropIfExists('assignment_qbanks');
    }
}
