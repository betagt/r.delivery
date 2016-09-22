<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderAvaliacaoItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_avaliacao_item', function (Blueprint $table) {
            $table->integer('avaliacao_id')->unsigned();
            $table->foreign('avaliacao_id')->references('id')->on('avaliacoes');

            $table->integer('order_avaliacao_id')->unsigned();
            $table->foreign('order_avaliacao_id')->references('id')->on('orders_avaliacoes');

            $table->primary(['order_avaliacao_id', 'avaliacao_id']);
            $table->integer('nota')->unsigned();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_avaliacao_item');
    }
}
