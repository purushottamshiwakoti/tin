<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandingInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_inquiries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('gender');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('email')->nullable();
            $table->string('subject')->default('Everest Landing Inquiry');
            $table->string('address')->nullable();
            $table->string('second_address')->nullable();
            $table->string('country');
            $table->string('nationality');
            $table->string('state');
            $table->string('postal_code');
            $table->string('phone_number')->nullable();
            $table->integer('number_of_person');
            $table->string('coupon_code')->nullable();
            $table->string('ip')->nullable();
            $table->text('message')->nullable();
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
        Schema::dropIfExists('landing_inquiries');
    }
}
