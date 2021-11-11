<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBookingsTable extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->unsignedBigInteger('table_booked_id')->nullable();
            $table->foreign('table_booked_id', 'table_booked_fk_5170797')->references('id')->on('tables');
        });
    }
}
