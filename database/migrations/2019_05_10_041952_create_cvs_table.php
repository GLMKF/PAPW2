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
            $table->string('aboutMe')->nullable();
            $table->integer('languages')->nullable();
            $table->string('workExperience');
            $table->string('workExperience_jobs');
            $table->string('portfolio');
            $table->string('portfolio_sections');
            $table->string('education')->nullable();
            $table->string('education_categories');
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
