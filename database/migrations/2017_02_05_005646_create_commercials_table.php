<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommercialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commercials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('commercial_name');
            $table->string('commercial_email')->unique();
            $table->string('commercial_password');
            $table->string('commercial_telephone');
            $table->string('commercial_address');
            $table->string('commercial_food_category')->default('ALL');
            $table->string('commercial_img_url')->default('localhost/jk-laravel-jkfoodease-testc/public/defaults/avatars/male.png');
            $table->string('commercial_licience_img_url')->default('localhost/jk-laravel-jkfoodease-testc/public/defaults/avatars/male.png');
            $table->double('commercial_ratings')->default(0);
            $table->string('commercial_delivery_type')->default('Foodease Driver');
            $table->boolean('commercial_halal')->default(1);
            $table->integer('food_likes')->default(0);
            $table->string('commercial_promotion_event')->default('No Promotion');
            $table->string('commercial_accepted_payment')->default('All Type Payment');
            $table->time('commercial_start_operation_hour');
            $table->time('commercial_end_operation_hour');
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
        Schema::drop('commercials');
    }
}
