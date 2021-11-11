<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('product_qty')->nullable();
            $table->integer('product_price')->nullable();
            $table->string('user_key')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
