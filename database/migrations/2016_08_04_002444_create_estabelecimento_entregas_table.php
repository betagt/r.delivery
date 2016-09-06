<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstabelecimentoEntregasTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estabelecimentos_entregas', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('estabelecimento_id')->unsigned();
            $table->foreign('estabelecimento_id')->references('id')->on('estabelecimentos');
			$table->integer('tempo_entrega')->default(1);
			$table->decimal('faixa_preco')->default(1);
			$table->integer('tipo_pagamento')->default(1);
			$table->integer('tipo_entrega')->default(1);

            $table->timestamps();
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
		Schema::drop('estabelecimentos_entregas');
	}

}
