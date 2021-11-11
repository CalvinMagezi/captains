<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSmsTable extends Migration
{
    public function up()
    {
        Schema::table('sms', function (Blueprint $table) {
            $table->unsignedBigInteger('keyword_id')->nullable();
            $table->foreign('keyword_id', 'keyword_fk_5170709')->references('id')->on('products');
            $table->unsignedBigInteger('table_id')->nullable();
            $table->foreign('table_id', 'table_fk_5170711')->references('id')->on('tables');
            $table->unsignedBigInteger('requested_waiter_id')->nullable();
            $table->foreign('requested_waiter_id', 'requested_waiter_fk_5170712')->references('id')->on('staff');
        });
    }
}
