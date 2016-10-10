<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPorcaoCategoriesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_porcao_categories', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('product_porcao_id')->unsigned();
			$table->foreign('product_porcao_id')->references('id')->on('product_porcaos');
			$table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
			$table->integer('qtde')->default(0)->unsigned();
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
		Schema::drop('product_porcao_categories');
	}

}
