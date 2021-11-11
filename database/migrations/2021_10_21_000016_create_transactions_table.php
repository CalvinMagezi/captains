<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_key')->nullable();
            $table->integer('paid_amount')->nullable();
            $table->integer('balance')->nullable();
            $table->string('payment_method')->nullable();
            $table->datetime('transac_date')->nullable();
            $table->integer('transac_amount')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
