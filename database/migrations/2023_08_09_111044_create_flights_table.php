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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->text('overview_description');
            $table->string('slug');
            $table->integer('starting_price');
            $table->string('from');
            $table->string('to');
            $table->text('book_flight_description');
            $table->text('flight_deals');
            $table->text('faqs');
            $table->bigInteger('sort_order')->nullable();
            $table->string('category')->nullable();
            $table->string('publish')->nullable();
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
        Schema::dropIfExists('flights');
    }
};
