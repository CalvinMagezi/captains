<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_5170837')->references('id')->on('categories');
            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id', 'type_fk_5170838')->references('id')->on('types');
        });
    }
}
