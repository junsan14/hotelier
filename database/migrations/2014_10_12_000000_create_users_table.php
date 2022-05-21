<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('twitter_id');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at');
            $table->string('status')->nullable();
            $table->string('sex')->nullable();
            $table->string('age')->nullable();
            $table->string('position')->nullable();
            $table->string('work_title')->nullable();
            $table->string('work_length')->nullable();
            $table->string('hotel_type')->nullable();
            $table->string('area')->nullable();
            $table->string('hotel_worker_num')->nullable();
            $table->string('hotel_adr')->nullable();
            $table->string('password');
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
};
