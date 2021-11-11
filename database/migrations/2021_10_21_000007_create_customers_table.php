<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('orders_placed')->nullable();
            $table->string('favorite_drink')->nullable();
            $table->string('favorite_food')->nullable();
            $table->datetime('favorite_time')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
