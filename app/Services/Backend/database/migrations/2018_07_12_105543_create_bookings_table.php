<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('trip_id');
            $table->unsignedInteger('customer_id')->nullable();
            $table->string('trip_name');
            $table->unsignedInteger('departure_id')->nullable();
            $table->string('start_date');
            $table->string('finish_date')->nullable();
            $table->double('price')->nullable();
            $table->double('total_price')->nullable();
            $table->integer('passenger_count');
            $table->string('airport_preference')->nullable();
            $table->mediumText('special_request')->nullable();
            $table->string('visit_source')->nullable();
            $table->string('booking_hash');
            $table->string('ip');
            $table->string('status')->default('incomplete');

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
        Schema::dropIfExists('bookings');
    }
}
