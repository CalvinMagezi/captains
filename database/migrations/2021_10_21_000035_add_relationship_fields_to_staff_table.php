<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToStaffTable extends Migration
{
    public function up()
    {
        Schema::table('staff', function (Blueprint $table) {
            $table->unsignedBigInteger('user_key_id')->nullable();
            $table->foreign('user_key_id', 'user_key_fk_5167939')->references('id')->on('users');
        });
    }
}
