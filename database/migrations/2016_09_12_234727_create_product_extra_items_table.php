<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductExtraItemsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_extra_items', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('product_extra_id')->unsigned();
            $table->foreign('product_extra_id')->references('id')->on('product_extras')
                ->onUpdate('cascade')
                ->onDelete('cascade')
            ;
			$table->string('name');
			$table->decimal('price');
            $table->integer('status')->default(0);
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

	}

}
