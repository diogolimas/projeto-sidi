<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndicadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicadors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_avaliacao');
            
            $table->foreign('id_avaliacao')->references('id')->on('avaliacaos')->onDelete('cascade');

            $table->string('descricao_indicador', 200);
            $table->float('nota_maxima')->nullable();
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
        Schema::dropIfExists('indicadors');
    }
}
