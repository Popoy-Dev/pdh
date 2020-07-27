<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otcs', function (Blueprint $table) {
            $table->id();
            $table->uuid('o_uuid')->index();
            $table->integer('user_id');
            $table->string('grade_level');
            $table->integer('amount');
            $table->integer('reg_fee');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('otcs');
    }
}
