<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosTurmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos_turmas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_turma');
            $table->unsignedBigInteger('id_user');

            $table->foreign('id_turma')->references('id')->on('turmas')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alunos_turmas');
    }
}
