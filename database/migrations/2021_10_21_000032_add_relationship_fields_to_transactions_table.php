<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTransactionsTable extends Migration
{
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->unsignedBigInteger('handled_by_id')->nullable();
            $table->foreign('handled_by_id', 'handled_by_fk_5167760')->references('id')->on('users');
        });
    }
}
