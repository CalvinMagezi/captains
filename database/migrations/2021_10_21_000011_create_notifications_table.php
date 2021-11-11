<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('unique_key')->unique();
            $table->string('for')->nullable();
            $table->string('from')->nullable();
            $table->string('purpose')->nullable();
            $table->datetime('time')->nullable();
            $table->string('completed');
            $table->longText('message')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
