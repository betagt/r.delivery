<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_extras', function (Blueprint $table) {
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade')
            ;
            $table->integer('category_extra_id')->unsigned();
            $table->foreign('category_extra_id')->references('id')->on('category_extras')
                ->onUpdate('cascade')
                ->onDelete('cascade')
            ;
            $table->primary(['product_id', 'category_extra_id']);
            $table->decimal('price')->default(0);
            $table->integer('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_extras');
    }
}
