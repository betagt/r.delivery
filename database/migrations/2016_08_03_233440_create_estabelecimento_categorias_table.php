<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstabelecimentoCategoriasTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estabelecimento_categorias', function(Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('legenda');
            $table->string('slug');
            $table->string('icon');
            $table->integer('status')->default(1);
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
		Schema::drop('estabelecimento_categorias');
	}

}
