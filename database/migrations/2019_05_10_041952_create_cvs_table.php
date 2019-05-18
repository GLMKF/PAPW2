<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cvs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user')->unique();
            $table->string('position')->nullable();
            $table->string('statusMarital')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('address')->nullable();
            $table->string('addressInfo');
            $table->string('cellphone')->nullable();
            $table->string('cellphoneInfo');
            $table->string('emailInfo');
            $table->string('aboutMe')->nullable();
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
        Schema::dropIfExists('cvs');
    }
}
