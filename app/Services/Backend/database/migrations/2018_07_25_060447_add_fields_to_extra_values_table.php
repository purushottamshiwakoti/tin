<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToExtraValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('extra_values',function (Blueprint $table){
            $table->string('value',16777215)->change();
            $table->string('type')->nullable()->default('default');
            $table->string('slug')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('extra_values', function (Blueprint $table){
            $table->dropColumn('type');
            $table->dropColumn('slug');
        });
    }
}
