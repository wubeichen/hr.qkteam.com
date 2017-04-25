<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('alias');
        });
        DB::table('role')->insert([
            [ 'id' => 1, 'name' => '负责人', 'alias' => 'director' ],
            [ 'id' => 2, 'name' => '组长', 'alias' => 'leader' ],
            [ 'id' => 3, 'name' => '成员', 'alias' => 'member' ],
            [ 'id' => 4, 'name' => '学员', 'alias' => 'student' ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role');
    }
}
