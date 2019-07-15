<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('email')->sparse_and_unique();
            $table->string('username')->sparse_and_unique();
            $table->string('country')->nullable();
            $table->string('image_id')->nullable();
            $table->string('image_path')->nullable();
            $table->string('image_name')->nullable();
            $table->string('status')->nullable();
            $table->timestamp('status_date')->nullable();
            $table->integer('email_is_verified')->default(0);
            $table->text('notification_id')->nullable()->sparse_and_unique();
            $table->integer('notification_flag');
            $table->text('quickblox_id')->nullable()->sparse_and_unique();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('user_details');
    }
}
