<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('provider')->default('Web_Clients');
            $table->string('provider_id')->default(0);
            $table->string('avatar')->nullable();
            $table->string('password');
            $table->string('type')->default('Clients');
            $table->string('credit')->default(0);
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('tambon')->nullable();
            $table->string('ampher')->nullable();
            $table->string('province')->nullable();
            $table->string('postcode')->nullable();
            $table->string('company')->nullable();
            $table->string('verify')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
