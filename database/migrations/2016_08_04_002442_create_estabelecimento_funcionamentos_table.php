<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstabelecimentoFuncionamentosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estabelecimentos_funcionamentos', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('estabelecimento_id')->unsigned();
			$table->foreign('estabelecimento_id')->references('id')->on('estabelecimentos');
			$table->integer('dia_funcionamento')->default(1);
			$table->integer('horario_funcionamento')->default(1);
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
		Schema::drop('estabelecimentos_funcionamentos');
	}

}
