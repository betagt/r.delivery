<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [1, 2, 3, 4, 5];
        $countCategories = count($categories);

        for ($i = 0; $i < $countCategories; $i++) {
            for ($j = 0; $j < 5; $j++) {
                $product = factory(\CodeDelivery\Models\Product::class)->create([
                    'category_id' => $categories[$i]
                ]);

                for ($l = 0; $l < 3; $l++) {
                    factory(\CodeDelivery\Models\Product::class)->create([
                        'category_id' => random_int(6, 50),
                        'parent_id' => $product->id
                    ]);
                }
            }
        }

        $var = [
            0 => ['nome' => 'P', 'qtde' => 1,],
            1 => ['nome' => 'M', 'qtde' => 2,],
            2 => ['nome' => 'G', 'qtde' => 3,],
            3 => ['nome' => 'B', 'qtde' => 4,],
        ];
        $countPorcoes = count($var);

        $porcao = [];
        for ($i = 0; $i < $countPorcoes; $i++) {
            $porcao[$i] = factory(\CodeDelivery\Models\Porcao::class)->create([
                'nome' => $var[$i]['nome'],
                'qtde' => $var[$i]['qtde'],
            ]);
        }

        $countPorcoes = count($porcao);
        for ($i = 0; $i < 20; $i++) {
            $id = $i + 1;
            for ($k = 0; $k < $countPorcoes; $k++)
            {
                factory(\CodeDelivery\Models\ProductPorcao::class)->create([
                    'product_id' => $id,
                    'porcao_id' => $porcao[$k]->id,
                    'preco' => random_int(10,40)
                ]);
            }
        }
    }
}
