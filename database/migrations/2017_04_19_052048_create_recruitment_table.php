<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruitmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitment', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->boolean('gender')->default(0);
            $table->string('birthday')->nullable();
            $table->string('school_number')->nullable();
            $table->string('qq')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->text('introduction')->nullable();
            $table->text('expectation')->nullable();
            $table->text('skill')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recruitment');
    }
}
