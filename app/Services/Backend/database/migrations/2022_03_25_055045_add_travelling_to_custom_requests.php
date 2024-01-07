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
        Schema::table('custom_requests', function (Blueprint $table) {
            $table->string('travelling')->nullable();
            $table->integer('adult_present')->nullable();
            $table->integer('infant_present')->nullable();
            $table->string('end_date')->nullable();
            $table->string('interested')->nullable();
            $table->string('budget_optimization')->nullable();
            $table->string('full_name')->nullable();
            $table->string('nationality')->nullable();
            $table->string('state')->nullable();
            $table->string('about_us')->nullable();
            $table->string('guide')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('custom_requests', function (Blueprint $table) {
            //
        });
    }
};
