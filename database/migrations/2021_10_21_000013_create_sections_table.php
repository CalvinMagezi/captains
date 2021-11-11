<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->longText('items')->nullable();
            $table->integer('total_sales')->nullable();
            $table->integer('today_sales')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
