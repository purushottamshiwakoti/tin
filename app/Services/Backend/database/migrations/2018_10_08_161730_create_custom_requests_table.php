<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email');
            $table->string('phone_number')->nullable();
            $table->string('passenger_count')->nullable();
            $table->string('group_type')->nullable();
            $table->boolean('children_present')->default(0)->nullable();
            $table->string('start_date');
            $table->integer('days_count');
            $table->string('activities');
            $table->mediumText('description')->nullable();
            $table->string('request_type')->default('private_departure');
            $table->string('destination')->default('Nepal');
            $table->string('desired_cost_per_person')->nullable();
            $table->string('flight_country_from')->nullable();
            $table->string('accommodation_styles')->nullable();
            $table->string('accommodation_standards')->nullable();
            $table->string('meal_preference')->nullable();
            $table->string('referral_source')->nullable();
            $table->string('contact_options')->nullable();
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
        Schema::dropIfExists('custom_requests');
    }
}
