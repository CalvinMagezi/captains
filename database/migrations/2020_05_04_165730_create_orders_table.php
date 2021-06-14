<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('taken_by')->nullable();
            $table->string('table_number')->nullable();
            $table->string('specifics')->nullable();
            $table->string('priority')->nullable();
            $table->integer('quantities')->nullable();
            $table->integer('quantities_total')->nullable();
            $table->integer('prices')->nullable();
            $table->integer('prices_total')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
