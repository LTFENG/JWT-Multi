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
            $table->string('email')->unique();
            $table->string('password');
            $table->string('telephone');
            $table->double('location_lat',20,10)->default(4.2105);
            $table->double('location_long',20,10)->default(101.9758);
            $table->date('birthday');
            $table->boolean('gender')->default(0);
            $table->string('races');
            $table->string('payment_method')->default('Cash On Delivery');
            $table->string('avatar')->default('localhost/jk-laravel-jkfoodease-testc/public/defaults/avatars/male.png');
            $table->string('slug')->default('user-name');
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
        Schema::drop('users');
    }
}
