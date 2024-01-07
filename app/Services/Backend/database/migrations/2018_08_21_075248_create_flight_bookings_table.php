<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight_bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('departure');
            $table->string('arrival');
            $table->string('flight_type')->default('one_way');
            $table->string('departure_date');
            $table->string('return_date')->nullable();
            $table->integer('number_of_pax');
            $table->string('passengers');
            $table->boolean('flexible_date')->nullable()->default(0);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('nationality')->nullable();
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
        Schema::dropIfExists('flight_bookings');
    }
}
