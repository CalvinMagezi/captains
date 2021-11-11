<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('unique_key')->unique();
            $table->string('status')->nullable();
            $table->string('taken_by')->nullable();
            $table->string('closed_by')->nullable();
            $table->string('table_number')->nullable();
            $table->longText('extra_notes')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('amount_received')->nullable();
            $table->datetime('completed_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
