<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropEstabelecimentoAvaliacaoItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('estabelecimento_avaliacao_item');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('estabelecimento_avaliacao_item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('avaliacao_id')->unsigned();
            $table->integer('estabelecimento_id')->unsigned();

            $table->foreign('estabelecimento_id')->references('id')->on('estabelecimento_avaliacaos')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('avaliacao_id')->references('id')->on('avaliacoes')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('nota')->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });
    }
}
