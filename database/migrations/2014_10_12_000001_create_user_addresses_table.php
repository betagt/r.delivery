<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAddressesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_addresses', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('address');
			$table->string('complement')->nullable();
			$table->string('reference_point')->nullable();
			$table->string('number')->default('s/n' );
			$table->string('neighborhood');
			$table->string('city');
			$table->string('state');
			$table->string('zipcode');
			$table->string('latitude');
			$table->string('longetude');
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
		Schema::drop('user_addresses');
	}

}
