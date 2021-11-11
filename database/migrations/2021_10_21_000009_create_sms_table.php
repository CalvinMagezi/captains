<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsTable extends Migration
{
    public function up()
    {
        Schema::create('sms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('placed_by');
            $table->string('unique_key')->unique();
            $table->datetime('time')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
