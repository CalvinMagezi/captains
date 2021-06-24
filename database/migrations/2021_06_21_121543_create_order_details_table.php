<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id');
            $table->string('taken_by')->nullable();
            $table->string('table_number')->nullable();
            $table->string('item_name')->nullable();
            $table->string('item_category')->nullable();
            $table->string('dispatched_to')->nullable();
            $table->boolean('ready')->default(false);
            $table->string('item_m_category')->nullable();            
            $table->string('price')->nullable();
            $table->string('quantity')->nullable();
            $table->string('specifics')->nullable();
            $table->string('priority')->nullable();
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
