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
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('suffix')->nullable();
            $table->string('stud_num')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('sex');
            $table->string('mobile_num');
            $table->string('guardian_name');
            $table->string('guardian_num');
            $table->string('barangay');
            $table->string('street');
            $table->string('city');
            $table->string('province');
            $table->string('college');
            $table->string('course');
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
