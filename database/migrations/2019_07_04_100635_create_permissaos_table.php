<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissaos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('cadastrar_usuario')->nullable();
            $table->boolean('cadastrar_avaliacao')->nullable();
            $table->boolean('cadastrar_indicador')->nullable();
            $table->boolean('edit_delete_usuario')->nullable();
            $table->boolean('edit_delete_avaliacao')->nullable();
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
        Schema::dropIfExists('permissaos');
    }
}
