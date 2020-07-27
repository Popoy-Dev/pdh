<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->uuid('in_uuid')->index();
            $table->integer('in_user_id');
            $table->string('invoice_num')->nullable();
            $table->integer('amount')->nullable();
            $table->string('coupon')->nullable();
            $table->integer('grade')->nullable();
            $table->integer('regfee_status');
            $table->integer('inv_status')->default(0);
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
        Schema::dropIfExists('invoices');
    }
}
