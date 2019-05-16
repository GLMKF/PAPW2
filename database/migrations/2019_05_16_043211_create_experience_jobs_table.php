<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienceJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experience_jobs', function (Blueprint $table) {
            $table->string('user');
            $table->string('position')->nullable();
            $table->string('institution');
            $table->string('finish')->nullable();
            $table->string('description')->nullable();
            $table->string('activity1')->nullable();
            $table->string('activity2')->nullable();
            $table->string('activity3')->nullable();
            $table->primary(array('user', 'institution'));
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
        Schema::dropIfExists('experience_jobs');
    }
}
