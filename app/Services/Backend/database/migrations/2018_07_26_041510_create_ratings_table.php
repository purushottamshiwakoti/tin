<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('ratable_type')->nullable();
            $table->unsignedInteger('ratable_id')->nullable();
            $table->string('ratable_title')->nullable();
            $table->double('rating_value')->nullable()->default(0);
            $table->mediumText('review')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('full_name')->nullable();
            $table->boolean('publish')->default(0);
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
        Schema::dropIfExists('ratings');
    }
}
