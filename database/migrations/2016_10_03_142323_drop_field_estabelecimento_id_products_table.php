<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropFieldEstabelecimentoIdProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('products', 'estabelecimento_id')) {
            Schema::table('products',function (Blueprint $table){
                $table->dropForeign('products_estabelecimento_id_foreign');
                $table->dropColumn('estabelecimento_id');
            });
        }
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
