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
			$table->string('icone')->default('logo.jpg');
			$table->string('nome');
			$table->string('descricao')->nullable();
			$table->string('telefone');
			$table->string('email');
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
		Schema::drop('estabelecimentos');
	}

}
