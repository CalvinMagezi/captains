<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRequisitionsTable extends Migration
{
    public function up()
    {
        Schema::table('requisitions', function (Blueprint $table) {
            $table->unsignedBigInteger('for_id');
            $table->foreign('for_id', 'for_fk_5170699')->references('id')->on('products');
        });
    }
}
