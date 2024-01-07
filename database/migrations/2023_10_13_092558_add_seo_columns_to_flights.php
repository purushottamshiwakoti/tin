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
        Schema::table('flights', function (Blueprint $table) {
            $table->string('seo_keywords')->nullable()->after('faqs');
            $table->string('seo_title')->nullable()->after('faqs');
            $table->string('seo_description')->nullable()->after('faqs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('flights', function (Blueprint $table) {
            $table->dropColumn(['seo_keywords', 'seo_title', 'seo_description']);
        });
    }
};
