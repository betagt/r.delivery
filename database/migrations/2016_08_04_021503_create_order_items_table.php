<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->integer('product_extra_id')->unsigned()->default(0);
            $table->integer('porcao_id')->unsigned()->default(0);
            $table->string('ide')->nullable();
            $table->decimal('price');
            $table->smallInteger('qtd');
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
        Schema::drop('order_items');
    }
}
