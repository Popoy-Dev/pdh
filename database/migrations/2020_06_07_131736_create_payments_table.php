<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('py_uuid')->index();
            $table->integer('py_user_id');
            $table->string('py_name');
            $table->string('py_email');
            $table->string('py_contact');
            $table->string('trace_no');
            $table->integer('py_amount');
            $table->longtext('py_details');
            $table->integer('py_course_id')->nullable();
            $table->string('py_pay_type');
            $table->string('refNo')->nullable();
            $table->integer('invoice_id');
            $table->string('py_status')->default('pending');
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
        Schema::dropIfExists('payments');
    }
}
