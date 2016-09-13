<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProductExtrasIncldeTipo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_extras', function (Blueprint $table) {
            $table->integer('tipo')->default(1)->after('category_extra_id');
            $table->dropColumn('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_extras', function (Blueprint $table) {
            $table->decimal('price')->default(0);
            $table->dropColumn('tipo');
        });
    }
}
