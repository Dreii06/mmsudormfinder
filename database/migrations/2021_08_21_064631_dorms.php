<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Dorms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dorms', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('dorm_name');
            $table->string('barangay')->nullable();
            $table->string('street')->nullable();
            $table->string('nearest')->nullable();
            $table->string('mobile_num');
            $table->string('num_of_occupants')->nullable();
            $table->string('capacity')->nullable();
            $table->string('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dorms');
    }
}
