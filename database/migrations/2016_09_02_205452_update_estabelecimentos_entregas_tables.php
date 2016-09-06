<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEstabelecimentosEntregasTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estabelecimentos_entregas', function (Blueprint $table) {
            $table->integer('faixa_preco')->default(1)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estabelecimentos_entregas', function (Blueprint $table) {
            $table->decimal('faixa_preco')->default(1)->change();
        });
    }
}
