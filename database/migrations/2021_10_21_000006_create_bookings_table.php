<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('unique_key')->unique();
            $table->string('booked_by');
            $table->datetime('booked_for')->nullable();
            $table->longText('specifics')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
