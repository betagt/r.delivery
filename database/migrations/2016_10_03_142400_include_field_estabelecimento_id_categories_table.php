<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IncludeFieldEstabelecimentoIdCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->integer('estabelecimento_id')->unsigned()->after('id');
            $table->foreign('estabelecimento_id')->references('id')->on('estabelecimentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('categories', 'estabelecimento_id')) {
            Schema::table('categories',function (Blueprint $table){
                $table->dropForeign('categories_estabelecimento_id_foreign');
                $table->dropColumn('estabelecimento_id');
            });
        }
    }
}
