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
            $table->foreignId('user_id')->nullable();                
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
            $table->string('item_name')->nullable();        
            $table->string('quantity')->nullable();
            $table->string('amount')->nullable();
            $table->string('table_number')->nullable(); 
            $table->integer('priority')->default(0);
            $table->string('status')->nullable();
            $table->string('specifics')->nullable();
            $table->string('unique_id')->nullable();                                                                          
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
