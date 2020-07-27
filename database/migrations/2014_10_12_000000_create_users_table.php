<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->index();
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->string('birthplace');
            $table->string('religion');
            $table->string('gender');
            $table->string('photo')->nullable();
            $table->integer('isLogin')->default(0);
            $table->string('birthday');
            $table->string('address');
            $table->string('fathername')->nullable();
            $table->string('fathercontact')->nullable();
            $table->string('mothername')->nullable();
            $table->string('mothercontact')->nullable();
            $table->string('guardianname')->nullable();
            $table->string('relationship')->nullable();
            $table->string('guardiancontact')->nullable();
            $table->string('std_status')->nullable();
            $table->integer('grade')->nullable();
            $table->integer('grade_level')->nullable();
            $table->string('std_no')->nullable();
            $table->string('lrn_no')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
