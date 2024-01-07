<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsMenuFeaturedFieldToLastMinuteDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('last_minute_deals',function (Blueprint $table){
            $table->boolean('is_menu_featured')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('last_minute_deals',function (Blueprint $table){
            $table->dropColumn('is_menu_featured');
        });
    }
}
