<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTypesTable extends Migration
{
    public function up()
    {
        Schema::table('types', function (Blueprint $table) {
            $table->unsignedBigInteger('dispatched_to_id')->nullable();
            $table->foreign('dispatched_to_id', 'dispatched_to_fk_5170829')->references('id')->on('sections');
        });
    }
}
