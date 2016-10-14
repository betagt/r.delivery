<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateDropFieldProductPorcoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_porcaos', function(Blueprint $table) {
            $table->integer('porcao_id')->unsigned()->after('product_id');
            $table->foreign('porcao_id')->references('id')->on('porcaos');
        });

        Schema::table('product_porcaos', function(Blueprint $table) {
            if (Schema::hasColumn('product_porcaos', 'nome'))
            {
                $table->dropColumn('nome');
            }
            if (Schema::hasColumn('product_porcaos', 'porcao'))
            {
                $table->dropColumn('porcao');
            }
        });

//        if (Schema::hasColumn('estabelecimentos', 'cidade_id')) {
//            Schema::table('estabelecimentos',function (Blueprint $table){
//                $table->dropForeign('estabelecimentos_cidade_id_foreign');
//                $table->dropColumn('cidade_id');
//            });
//        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('product_porcaos', 'porcao_id')) {
            Schema::table('product_porcaos', function (Blueprint $table) {
                $table->dropForeign('product_porcaos_porcao_id_foreign');
                $table->dropColumn('porcao_id');
            });
        }
        Schema::drop('product_porcaos');
    }
}
