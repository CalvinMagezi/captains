<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCustomersTable extends Migration
{
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->unsignedBigInteger('unique_key_id');
            $table->foreign('unique_key_id', 'unique_key_fk_5170782')->references('id')->on('users');
            $table->unsignedBigInteger('favorite_waiter_id')->nullable();
            $table->foreign('favorite_waiter_id', 'favorite_waiter_fk_5170787')->references('id')->on('staff');
        });
    }
}
