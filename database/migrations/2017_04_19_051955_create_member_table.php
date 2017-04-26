<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('password');
            $table->rememberToken();
            $table->boolean('gender')->default(0);
            $table->string('birthday')->nullable();
            $table->string('school_number')->unique();
            $table->string('qq')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('bank')->nullable();
            $table->string('bank_number')->nullable();
            $table->boolean('active')->default(0);
            $table->integer('role_id')->default(4);
        });
        DB::table('member')->insert([
            'name'          => '管理员',
            'password'      => bcrypt(md5('root')),
            'school_number' => 'root',
            'active'        => 1,
            'role_id'       => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member');
    }
}
