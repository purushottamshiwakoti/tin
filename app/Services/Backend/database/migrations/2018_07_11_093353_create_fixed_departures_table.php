<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFixedDeparturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixed_departures', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('trip_id');
            $table->foreign('trip_id')->references('id')->on('trips')->onDelete('cascade');

            $table->timestamp('start_date')->default(now()->addDays(1));
            $table->timestamp('finish_date')->default(now()->addDays(3));
            $table->string('availability')->defualt('available');
            $table->integer('size')->nullable()->defualt(0);
            $table->double('price')->nullable()->default(0);
            $table->boolean('publish')->default(1);

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
        Schema::dropIfExists('fixed_departures');
    }
}
