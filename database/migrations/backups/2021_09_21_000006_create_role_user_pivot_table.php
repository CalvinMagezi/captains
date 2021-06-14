<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->foredignId('user_id');

            $table->foreign('user_id', 'user_id_fk_372022')->references('id')->on('users')->onDelete('cascade');

            $table->foreignId('role_id');

            $table->foreign('role_id', 'role_id_fk_372022')->references('id')->on('roles')->onDelete('cascade');
        });
    }
}
