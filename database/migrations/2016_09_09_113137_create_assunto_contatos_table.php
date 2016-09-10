<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssuntoContatosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('assunto_contatos', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('assunto_id')->unsigned();
			$table->foreign('assunto_id')->references('id')->on('assuntos');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
			$table->text('message');
			$table->text('response');
			$table->integer('status')->default(1);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('assunto_contatos');
	}

}
