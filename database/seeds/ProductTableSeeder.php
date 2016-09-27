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
        $estado = factory(\CodeDelivery\Models\Estado::class)->create([
            'uf' => 'TO',
            'nome' => 'Tocantins'
        ]);

        $cidade = factory(\CodeDelivery\Models\Cidade::class)->make([
            'nome' => 'Palmas'
        ]);

        $estado->cidades()->save($cidade);

        $estabelecimento = factory(\CodeDelivery\Models\Estabelecimento::class)->create([
            'cidade_id' => 1,
            'power'=>random_int(1,2),
        ]);

        $estabelecimento->produtos()->save(factory(\CodeDelivery\Models\Product::class)->make([
            'category_id' => 1,
            'name' => 'Pizza'
        ]));

        $estabelecimento->produtos()->save(factory(\CodeDelivery\Models\Product::class)->make([
            'category_id' => 1,
            'parent_id' => 1,
            'name' => 'Calabresa',
        ]));

        $estabelecimento->produtos()->save(factory(\CodeDelivery\Models\Product::class)->make([
            'category_id' => 1,
            'parent_id' => 1,
            'name' => 'Portuguesa',
        ]));

        $estabelecimento->produtos()->save(factory(\CodeDelivery\Models\Product::class)->make([
            'category_id' => 1,
            'parent_id' => 1,
            'name' => '4 Queijos',
        ]));

        $var = [
            0 => [ 'nome' => 'P', 'porcao' => 1, 'preco' => 10, ],
            1 => [ 'nome' => 'M', 'porcao' => 2, 'preco' => 20, ],
            2 => [ 'nome' => 'G', 'porcao' => 3, 'preco' => 30, ],
            3 => [ 'nome' => 'B', 'porcao' => 4, 'preco' => 40, ],
        ];
        $index = count($var);
        for ($i = 0; $i < 4; $i++)
        {
            $id = $i + 1;
            for($j = 0; $j < $index; $j++)
            {
                factory(\CodeDelivery\Models\ProductPorcao::class)->create([
                    'product_id' => $id,
                    'nome' => $var[$j]['nome'],
                    'porcao' => $var[$j]['porcao'],
                    'preco' => $var[$j]['preco'],
                ]);
            }
        }

        for ($i = 0; $i < 20 ;$i++)
        {
            $e = factory(\CodeDelivery\Models\Estabelecimento::class)->create([
                'cidade_id' => 1,
                'power'=>random_int(1,2),
            ]);

            $e->endereco()->save(factory(\CodeDelivery\Models\EstabelecimentoEndereco::class)->make());

            $e->entrega()->save(factory(\CodeDelivery\Models\EstabelecimentoEntrega::class)->make());

            for ($j = 0; $j < 5; $j++)
            {
                $e->produtos()->save(factory(\CodeDelivery\Models\Product::class)->make([
                    'category_id' => random_int(1, 5)
                ]));
            }

            for ($k = 0; $k < 7; $k++)
            {
                $e->funcionamentos()->save(factory(\CodeDelivery\Models\EstabelecimentoFuncionamento::class)->make());
            }
        }
    }
}
