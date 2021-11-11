<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type')->nullable();
            $table->string('status')->nullable();
            $table->integer('percentage');
            $table->datetime('start')->nullable();
            $table->datetime('end')->nullable();
            $table->string('repeat');
            $table->string('happy_hour')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
