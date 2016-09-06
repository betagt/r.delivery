<?php

use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\CodeDelivery\Models\Avaliacao::class, 5)->create();

        for ($j = 0; $j < 20; $j++)
        {
            $o = factory(\CodeDelivery\Models\Order::class)->create(['estabelecimento_id' => random_int(1, 20)]);
            for ($i = 0; $i <= 5; $i++) {
                $o->items()->save(factory(\CodeDelivery\Models\OrderItem::class)->make([
                    'product_id' => random_int(1, 5),
                    'qtd' => 2,
                    'price' => 50
                ]));
            }
            $a = $o->avaliacao()->save(factory(\CodeDelivery\Models\OrderAvaliacao::class)->make());

            $q = 1;
            for ($k = 0; $k < 5; $k++)
            {
                DB::table('order_avaliacao_item')->insert([
                    ['order_avaliacao_id' => $a->id, 'avaliacao_id' => $q, 'nota' => random_int(1, 5)]
                ]);
                $q++;
            }

        }
    }
}
