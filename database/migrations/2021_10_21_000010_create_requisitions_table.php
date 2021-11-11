<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitionsTable extends Migration
{
    public function up()
    {
        Schema::create('requisitions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->integer('amount');
            $table->longText('specifics')->nullable();
            $table->datetime('latest_date')->nullable();
            $table->datetime('completed_on')->nullable();
            $table->string('approved_by')->nullable();
            $table->datetime('approved_on')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
