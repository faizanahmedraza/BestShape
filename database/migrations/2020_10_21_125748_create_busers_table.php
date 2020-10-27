<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('busers', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('phone');
            $table->string('email');
            $table->string('password');
            $table->string('address');
            $table->string('days');
            $table->string('energy_units');
            $table->string('weight_units');
            $table->string('height_units');
            $table->string('activity_level');
            $table->boolean('user');
            $table->boolean('coach');
            $table->boolean('tnc');
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
        Schema::dropIfExists('busers');
    }
}
