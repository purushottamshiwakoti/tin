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
        Schema::create('flight_departures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flight_id');
            $table->string('airline_name');
            $table->integer('duration');
            $table->integer('transits');
            $table->date('start_date');
            $table->date('finish_date')->nullable();
            $table->string('availablity')->default('guarenteed');
            $table->integer('size')->nullable();
            $table->integer('price');
            $table->boolean('publish')->nullable();
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
        Schema::dropIfExists('flight_departures');
    }
};
