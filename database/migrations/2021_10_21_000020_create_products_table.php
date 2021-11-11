<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('dispatched_to')->default('unset');
            $table->string('unique_key')->nullable();
            $table->longText('description')->nullable();
            $table->string('barcode')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('price')->nullable();
            $table->integer('hprice')->nullable();
            $table->string('details')->nullable();
            $table->string('status');
            $table->string('category')->nullable();
            $table->string('type')->nullable();
            $table->integer('stock')->nullable();
            $table->integer('alert_stock')->nullable();
            $table->string('sms_keyword')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
