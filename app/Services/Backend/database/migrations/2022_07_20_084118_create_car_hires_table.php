<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_hires', function (Blueprint $table) {
            $table->id();
            $table->string('departure');
            $table->string('arrival');
            $table->string('flight_type')->default('one_way');
            $table->string('departure_date');
            $table->string('return_date')->nullable();
            $table->integer('number_of_pax');
            $table->integer('adult')->nullable();
            $table->integer('child')->nullable();
            $table->integer('infant')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('message')->nullable();

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
        Schema::dropIfExists('car_hires');
    }
};