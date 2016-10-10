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
        $categories = [1,2,3,4,5];
        $countCategories = count($categories);

        for ($i = 0; $i < $countCategories; $i++)
        {
            for ($j = 0; $j < 5; $j++)
            {
                $product = factory(\CodeDelivery\Models\Product::class)->create([
                    'category_id' => $categories[$i]
                ]);

                for ($l = 0; $l < 3; $l++)
                {
                    factory(\CodeDelivery\Models\Product::class)->create([
                        'category_id' => random_int(6,50),
                        'parent_id' => $product->id
                    ]);
                }
            }
        }

        $porcoes = [
            0 => [ 'nome' => 'P', 'preco' => 10, ],
            1 => [ 'nome' => 'M', 'preco' => 20, ],
            2 => [ 'nome' => 'G', 'preco' => 30, ],
            3 => [ 'nome' => 'B', 'preco' => 40, ],
        ];
        $countPorcoes = count($porcoes);

        for ($i = 0; $i < 20; $i++)
        {
            $id = $i + 1;
            for($j = 0; $j < $countPorcoes; $j++)
            {
                $porcao = factory(\CodeDelivery\Models\ProductPorcao::class)->create([
                    'product_id' => $id,
                    'nome' => $porcoes[$j]['nome'],
                    'preco' => $porcoes[$j]['preco'],
                ]);

                factory(\CodeDelivery\Models\ProductPorcaoCategory::class)->create([
                    'product_porcao_id' => $porcao->id,
                    'category_id' => random_int(6,50)
                ]);
            }
        }
    }
}
