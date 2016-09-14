<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstabelecimentoAvaliacaosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estabelecimento_avaliacaos', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('users');
			$table->integer('estabelecimento_id')->unsigned();
            $table->foreign('estabelecimento_id')->references('id')->on('estabelecimentos');
			$table->text('mensagem')->nullable();
			$table->integer('status')->default(1);
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
		Schema::drop('estabelecimento_avaliacaos');
	}

}
