<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Usuário Teste
        $user = factory(\CodeDelivery\Models\User::class)->create([
                'name' => 'User',
                'email' => 'teste@teste.com',
                'password' => bcrypt('0409901'),
                'remember_token' => str_random(10),
            ]);
        $user->addresses()->save(factory(\CodeDelivery\Models\UserAddress::class)->make());
        $user->mensagens()->save(factory(\CodeDelivery\Models\Contato::class)->make());

        // Usuário Diuliano
        factory(\CodeDelivery\Models\User::class)->create([
            'name' => 'Admin',
            'email' => 'diuliano@betagt.com.br',
            'password' => bcrypt('0409901'),
            'role' => 'admin',
            'remember_token' => str_random(10),
        ])->addresses()->save(factory(\CodeDelivery\Models\UserAddress::class)->make());
        factory(\CodeDelivery\Models\User::class)->create([
            'name' => 'Admin',
            'email' => 'guest@betagt.com.br',
            'password' => bcrypt('guest'),
            'role' => 'guest',
            'remember_token' => str_random(10),
        ])->addresses()->save(factory(\CodeDelivery\Models\UserAddress::class)->make());

        // Usuário Allan
        factory(\CodeDelivery\Models\User::class)->create([
            'name' => 'Allan',
            'email' => 'allanroberto18@gmail.com',
            'password' => bcrypt('kerberos280104'),
            'role' => 'admin',
            'remember_token' => str_random(10),
        ])->addresses()->save(factory(\CodeDelivery\Models\UserAddress::class)->make());

        // Usuários - Clientes
        factory(\CodeDelivery\Models\User::class, 10)->create()->each(function ($u) {
            $u->addresses()->save(factory(\CodeDelivery\Models\UserAddress::class)->make());
            $u->mensagens()->save(factory(\CodeDelivery\Models\Contato::class)->make());
        });

        // Usuários - Entregadores
        factory(\CodeDelivery\Models\User::class, 3)->create([
            'role' => 'deliveryman',
        ]);
    }
}
