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
            $table->string('status')->nullable();
            $table->string('taken_by')->nullable();
            $table->string('table_number')->nullable();
            $table->string('items')->nullable();
            $table->string('specifics')->nullable();
            $table->string('priority')->nullable();
            $table->string('quantities')->nullable();            
            $table->string('prices')->nullable();
            $table->string('prices_total')->nullable();
            $table->dateTime('completed_at')->nullable();
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
