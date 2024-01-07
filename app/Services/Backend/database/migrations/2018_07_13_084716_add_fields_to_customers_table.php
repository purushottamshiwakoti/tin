<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers',function (Blueprint $table){
            $table->string('middle_name')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('nationality')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('country')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers',function (Blueprint $table){
            $table->dropColumn('middle_name');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('nationality');
            $table->dropColumn('gender');
            $table->dropColumn('address');
            $table->dropColumn('mobile_number');
            $table->dropColumn('state');
            $table->dropColumn('zip_code');
            $table->dropColumn('country');
        });
    }
}
