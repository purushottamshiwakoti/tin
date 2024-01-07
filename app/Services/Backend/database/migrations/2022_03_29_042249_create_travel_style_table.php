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
        Schema::create('travel_style', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('excerpt')->nullable();
            $table->mediumText('description')->nullable();
            $table->string('slug')->nullable();
            $table->string('publish_types')->nullable();
            $table->boolean('publish')->default(1);
            $table->string('order')->nullable();
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
        Schema::dropIfExists('travel_style');
    }
};
