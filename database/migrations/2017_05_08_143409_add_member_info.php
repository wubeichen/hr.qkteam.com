<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMemberInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('member', function (Blueprint $table) {
            $table->string('department')->nullable();
            $table->string('major')->nullable();
            $table->string('homepage')->nullable();
            $table->string('github')->nullable();
        });
        Schema::table('recruitment', function (Blueprint $table) {
            $table->string('department')->nullable();
            $table->string('major')->nullable();
            $table->string('homepage')->nullable();
            $table->string('github')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('member', function (Blueprint $table) {
            $table->dropColumn('department')->nullable();
            $table->dropColumn('major')->nullable();
            $table->dropColumn('homepage')->nullable();
            $table->dropColumn('github')->nullable();
        });
        Schema::table('recruitment', function (Blueprint $table) {
            $table->dropColumn('department')->nullable();
            $table->dropColumn('major')->nullable();
            $table->dropColumn('homepage')->nullable();
            $table->dropColumn('github')->nullable();
        });
    }
}
