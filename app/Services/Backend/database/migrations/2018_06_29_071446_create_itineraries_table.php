<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItinerariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itineraries', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('trip_id');
            $table->foreign('trip_id')->references('id')->on('trips')->onDelete('cascade');
            $table->mediumText('short_description')->nullable();
            $table->mediumText('full_description')->nullable();
            $table->mediumText('equipment')->nullable();
            $table->mediumText('price_include')->nullable();
            $table->mediumText('price_exclude')->nullable();
            $table->mediumText('keys')->nullable();
            $table->mediumText('values')->nullable();
            $table->mediumText('map_iframe')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itineraries');
    }
}
