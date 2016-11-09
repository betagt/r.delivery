<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstabelecimentosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estabelecimentos', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('cidade_id')->unsigned();
            $table->foreign('cidade_id')->references('id')->on('cidades');
            $table->integer('estabelecimento_categoria_id')->unsigned();
            $table->foreign('estabelecimento_categoria_id')->references('id')->on('estabelecimento_categorias');
			$table->string('icone')->default('logo.jpg');
            $table->string('icone_link', 255);
			$table->string('nome');
			$table->string('descricao')->nullable();
			$table->string('telefone');
			$table->string('email');
			$table->integer('status')->default(1);
            $table->integer('power')->default(1);
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
		Schema::drop('estabelecimentos');
	}

}
