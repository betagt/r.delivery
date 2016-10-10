<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableProductPorcaosDropColumnPorcao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_porcaos', function(Blueprint $table) {
            $table->dropColumn('porcao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_porcaos', function(Blueprint $table) {
            $table->integer('porcao')->default(0)->after('product_id');
        });
    }
}
