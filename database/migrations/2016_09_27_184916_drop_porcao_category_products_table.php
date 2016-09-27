<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropPorcaoCategoryProductsTable extends Migration
{
    public function up()
    {

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('porcao_category_products'))
        {
            Schema::drop('porcao_category_products');
        }
    }
}
