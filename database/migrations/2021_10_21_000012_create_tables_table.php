<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablesTable extends Migration
{
    public function up()
    {
        Schema::create('tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('table_number')->unique();
            $table->string('qr_code')->nullable();
            $table->string('managed_by')->nullable();
            $table->string('table_key')->unique();
            $table->string('color_code')->nullable();
            $table->string('order')->nullable();
            $table->string('section')->nullable();
            $table->string('position')->nullable();
            $table->string('status')->nullable();
            $table->string('top')->nullable();
            $table->string('left')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
