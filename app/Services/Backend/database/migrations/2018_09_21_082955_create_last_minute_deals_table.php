<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLastMinuteDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('last_minute_deals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('departure_id');
            $table->foreign('departure_id')->references('id')->on('fixed_departures')->onDelete('cascade');
            $table->double('deal_price');
            $table->integer('available_size')->nullable();
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
        Schema::dropIfExists('last_minute_deals');
    }
}
