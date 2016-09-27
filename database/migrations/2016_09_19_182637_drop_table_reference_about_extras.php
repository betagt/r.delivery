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

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('product_extra_items'))
        {
            Schema::drop('product_extra_items');
        }
        if (Schema::hasTable('product_extras'))
        {
            Schema::drop('product_extras');
        }
        if (Schema::hasTable('category_extras'))
        {
            Schema::drop('category_extras');
        }
    }
}
