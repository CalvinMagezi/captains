<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->unsignedBigInteger('dispatched_to_id')->nullable();
            $table->foreign('dispatched_to_id', 'dispatched_to_fk_5170823')->references('id')->on('sections');
        });
    }
}
