<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreatePapelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('papels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('permissao_id')->nullable();
            $table->text('descricao', 200);
            $table->string('nome', 45);
            $table->foreign('permissao_id')->references('id')->on('permissaos')->onDelete('cascade');
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
        Schema::dropIfExists('papels');
    }
}