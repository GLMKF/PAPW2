<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idUserSend');
            $table->unsignedInteger('idUserRecive');
            $table->mediumText('desc');
            $table->unsignedInteger('response');
            $table->string('time_send',50);
            $table->timestamps();

            $table->foreign('idUserSend')->references('id')->on('users');
            $table->foreign('idUserRecive')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
