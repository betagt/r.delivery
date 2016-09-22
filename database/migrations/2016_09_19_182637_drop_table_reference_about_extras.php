<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropTableReferenceAboutExtras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('product_extra_items');
        Schema::drop('product_extras');
        Schema::drop('category_extras');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('category_extras', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade')
            ;
            $table->string('name');
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('product_extras', function (Blueprint $table) {
            $table->increments('id');
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
            $table->decimal('price')->default(0);
            $table->integer('status')->default(1);
        });
        Schema::table('product_extras', function (Blueprint $table) {
            $table->integer('tipo')->default(1)->after('category_extra_id');
            $table->dropColumn('price');
        });
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
}
