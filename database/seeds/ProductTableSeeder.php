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

        for ($i = 0; $i < 20 ;$i++)
        {
            $e = factory(\CodeDelivery\Models\Estabelecimento::class)->create([
                'cidade_id' => 1,
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
