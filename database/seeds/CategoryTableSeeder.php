<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
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

        $cidade = factory(\CodeDelivery\Models\Cidade::class)->make([
            'nome' => 'Paraíso'
        ]);

        $estado->cidades()->save($cidade);


        $cidade = factory(\CodeDelivery\Models\Cidade::class)->make([
            'nome' => 'Gurupi'
        ]);

        $estado->cidades()->save($cidade);


        $cidade = factory(\CodeDelivery\Models\Cidade::class)->make([
            'nome' => 'Araguaína'
        ]);

        $estado->cidades()->save($cidade);

        for ($i = 0; $i < 5 ;$i++)
        {
            $e = factory(\CodeDelivery\Models\Estabelecimento::class)->create([
                'cidade_id' => 1,
                'power'=>random_int(1,2),
            ]);

            $e->endereco()->save(factory(\CodeDelivery\Models\EstabelecimentoEndereco::class)->make());

            $e->entrega()->save(factory(\CodeDelivery\Models\EstabelecimentoEntrega::class)->make());

            for ($j = 0; $j < 5; $j++)
            {
                $category = factory(\CodeDelivery\Models\Category::class)->create([
                    'estabelecimento_id' => $e->id,
                ]);

                factory(\CodeDelivery\Models\Category::class, 5)->create([
                    'estabelecimento_id' => $e->id,
                    'parent_id' => $category->id
                ]);
            }

            for ($k = 0; $k < 7; $k++)
            {
                $e->funcionamentos()->save(factory(\CodeDelivery\Models\EstabelecimentoFuncionamento::class)->make());
            }
        }
    }
}
