<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('cpf', 25)->nullable();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('role')->default('client');
            $table->char('sexo')->default('M');
            $table->date('data_nascimento')->nullable();
            $table->string('telefone_celular', 15);
            $table->string('telefone_fixo', 15)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
