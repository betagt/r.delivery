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
            $table->integer('order_avaliacao_id')->unsigned();

            $table->primary(['order_avaliacao_id', 'avaliacao_id']);

            $table->foreign('order_avaliacao_id')->references('id')->on('orders_avaliacoes')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('avaliacao_id')->references('id')->on('items')
                ->onDelete('cascade')->onUpdate('cascade');

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
