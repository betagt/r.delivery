<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropPorcaoCategoryTable extends Migration
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
        if (Schema::hasTable('porcao_categories'))
        {
            Schema::drop('porcao_categories');
        }
    }
}
