<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldToSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sliders',function (Blueprint $table){
            $table->string('link_title')->nullable();
            $table->string('order')->default(2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sliders',function (Blueprint $table){
            $table->dropColumn('link_title');
            $table->dropColumn('order');
        });
    }
}
