<?php

use Illuminate\Database\Seeder;

class OauthClientTableSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\CodeDelivery\Models\OauthClient::class)->create([
            'id' => 'appid01',
            'secret' => 'secret',
            'name' => 'Minha app mobile',
        ])->save();
    }
}
