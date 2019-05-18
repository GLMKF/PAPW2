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
            $table->string('typeUser')->nullable();
            $table->string('speciality')->nullable();
            $table->string('team1')->nullable();
            $table->string('team2')->nullable();
            $table->string('team3')->nullable();
            $table->string('urlPinterest')->nullable();
            $table->string('urlLinkedin')->nullable();
            $table->string('urlInstagram')->nullable();
            $table->string('urlFacebook')->nullable();
            $table->string('urlTwitter')->nullable();
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
