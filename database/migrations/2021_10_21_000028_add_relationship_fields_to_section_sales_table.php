<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSectionSalesTable extends Migration
{
    public function up()
    {
        Schema::table('section_sales', function (Blueprint $table) {
            $table->unsignedBigInteger('section_id')->nullable();
            $table->foreign('section_id', 'section_fk_5170804')->references('id')->on('sections');
        });
    }
}
