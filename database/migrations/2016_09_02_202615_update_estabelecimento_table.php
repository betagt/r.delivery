<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEstabelecimentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estabelecimentos', function (Blueprint $table) {
            $table->integer('cidade_id')->unsigned()->after('id');
            $table->foreign('cidade_id')->references('id')->on('cidades');
            $table->string('icone_link', 255)->after('icone');
            $table->integer('power')->default(1)->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estabelecimentos',function (Blueprint $table){
            $table->dropForeign('estabelecimentos_cidade_id_foreign');
            $table->dropColumn('cidade_id');
            $table->dropColumn('icone_link');
            $table->dropColumn('power');
        });
        Schema::drop('estabelecimentos');
        Schema::drop('cidades');
    }
}
