<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('offerable_id')->nullable();
            $table->string('offerable_type')->nullable();
            $table->string('offerable_title')->nullable();
            $table->timestamp('start_date')->default(now());
            $table->timestamp('finish_date')->default(now()->addDays(1));
            $table->string('title');
            $table->integer('remaining')->nullable();
            $table->double('discount')->nullable();
            $table->boolean('publish')->nullable()->default(0);

            $table->softDeletes();
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
        Schema::dropIfExists('offers');
    }
}
