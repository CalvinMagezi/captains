<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionSalesTable extends Migration
{
    public function up()
    {
        Schema::create('section_sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('todays_sales')->nullable();
            $table->integer('yesterdays_sales')->nullable();
            $table->integer('weeks_sales')->nullable();
            $table->integer('months_sales')->nullable();
            $table->integer('years_sales')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
