<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrderDetailsTable extends Migration
{
    public function up()
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->unsignedBigInteger('order_key_id')->nullable();
            $table->foreign('order_key_id', 'order_key_fk_5167833')->references('id')->on('orders');
            $table->unsignedBigInteger('product_key_id')->nullable();
            $table->foreign('product_key_id', 'product_key_fk_5167799')->references('id')->on('products');
        });
    }
}
