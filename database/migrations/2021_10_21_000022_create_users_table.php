<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('unique_key')->nullable()->unique();
            $table->string('name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('phone_number')->nullable();
            $table->datetime('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('locale')->nullable();
            $table->string('role')->nullable();
            $table->string('tables_incharge_of')->nullable();
            $table->string('staff_number')->nullable();
            $table->string('color_code')->default('red');
            $table->string('position')->nullable();
            $table->string('pin')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
