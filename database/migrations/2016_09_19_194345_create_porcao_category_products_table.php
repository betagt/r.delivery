<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePorcaoCategoryProductsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('porcao_category_products', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('porcao_category_id')->unsigned();
            $table->foreign('porcao_category_id')->references('id')->on('porcao_categories');
			$table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
			$table->decimal('preco');
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
		Schema::drop('porcao_category_products');
	}

}
