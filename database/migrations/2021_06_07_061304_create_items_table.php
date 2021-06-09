<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->nullable();
            $table->string('name')->nullable();
            $table->string('details')->nullable();
            $table->string('major_category')->nullable();
            $table->string('category')->nullable();
            $table->string('specifics')->nullable();
            $table->decimal('sprice', 15, 2)->nullable();
            $table->decimal('hprice', 15, 2)->nullable();        
            $table->string('status')->nullable();
            $table->decimal('price', 8, 2);
            $table->integer('quantity')->default('1');
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
        Schema::dropIfExists('items');
    }
}
