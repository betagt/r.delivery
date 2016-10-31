<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstabelecimentoEntregadorsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estabelecimento_entregadors', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('estabelecimento_id')->unsigned()->nullable();
            $table->foreign('estabelecimento_id')->references('id')->on('estabelecimentos');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
		Schema::drop('estabelecimento_entregadors');
	}

}
