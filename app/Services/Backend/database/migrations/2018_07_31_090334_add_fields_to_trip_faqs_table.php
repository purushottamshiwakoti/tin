<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToTripFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trip_faqs',function (Blueprint $table){
            $table->boolean('publish')->default(1);
            $table->string('category_title')->nullable();
            $table->integer('category_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trip_faqs',function (Blueprint $table){
            $table->dropColumn('publish');
            $table->dropColumn('category_title');
            $table->dropColumn('category_id');
        });
    }
}
