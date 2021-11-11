<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantity')->nullable();
            $table->integer('unit_price')->nullable();
            $table->integer('amount')->nullable();
            $table->integer('discount')->nullable();
            $table->string('dispatched_to')->nullable();
            $table->string('ready')->nullable();
            $table->string('specifics')->nullable();
            $table->string('priority')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
