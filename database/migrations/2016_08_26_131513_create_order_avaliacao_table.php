<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderAvaliacaoTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders_avaliacoes', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders');
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
		Schema::drop('orders_avaliacoes');
	}

}
