<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCancellationsInBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings',function (Blueprint $table){
            $table->timestamp('cancel_requested_at')->nullable();
            $table->string('customer_remarks')->nullable();
            $table->timestamp('cancelled_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings',function (Blueprint $table){
            $table->dropColumn('cancel_requested_at');
            $table->dropColumn('customer_remarks');
            $table->dropColumn('cancelled_at');
        });
    }
}
