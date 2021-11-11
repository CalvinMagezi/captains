<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('staff_number')->unique();
            $table->string('tables_in_charge_of')->nullable();
            $table->string('casuals_assigned')->nullable();
            $table->string('color_code')->nullable();
            $table->datetime('clocked_in')->nullable();
            $table->datetime('clocked_out')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
