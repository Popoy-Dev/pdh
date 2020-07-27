<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearnMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learn_materials', function (Blueprint $table) {
            $table->id();
            $table->uuid('lm_uuid')->index();
            $table->string('file')->nullable();
            $table->string('v_thumbnail')->nullable();
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
        Schema::dropIfExists('learn_materials');
    }
}
