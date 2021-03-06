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
        factory(\CodeDelivery\Models\EstabelecimentoCategoria::class)->create([
            'titulo' => 'Comida',
            'legenda' => 'Fome? Deixa a gente matar sua fome :)',
            'icon'=>'procura.jpg'
        ]);
        factory(\CodeDelivery\Models\EstabelecimentoCategoria::class)->create([
            'titulo' => 'Fármacia',
            'legenda' => 'Precisa de remédio? Nós te ligamos a farmácia',
            'icon'=>'procura.jpg'
        ]);
        factory(\CodeDelivery\Models\EstabelecimentoCategoria::class)->create([
            'titulo' => 'Informática',
            'legenda' => 'Precisa de equipamento pede com a gente!',
            'icon'=>'procura.jpg'
        ]);
        $estado = factory(\CodeDelivery\Models\Estado::class)->create([
            'uf' => 'TO',
            'nome' => 'Tocantins'
        ]);

        $cidade = factory(\CodeDelivery\Models\Cidade::class)->make([
            'nome' => 'Palmas'
        ]);

        $estado->cidades()->save($cidade);

        $this->moorango();

        $this->divinoFogao();

        $this->rosario();
    }

    public function estabelecimento($nome, $foto, $tipo, $power=1)
    {
        $e = factory(\CodeDelivery\Models\Estabelecimento::class)->create([
            'cidade_id' => 1,
            'user_id' => 1,
            'estabelecimento_categoria_id' => $tipo,
            'nome' => $nome,
            'icone' => $foto,
            'power'=> $power,
        ]);

        $e->endereco()->save(factory(\CodeDelivery\Models\EstabelecimentoEndereco::class)->make());

        $e->entrega()->save(factory(\CodeDelivery\Models\EstabelecimentoEntrega::class)->make());

        for ($k = 0; $k < 7; $k++)
        {
            $e->funcionamentos()->save(factory(\CodeDelivery\Models\EstabelecimentoFuncionamento::class)->make());
        }

        return $e;
    }

    public function category($estabelecimento, $nome, $parent=0){
        $category = factory(\CodeDelivery\Models\Category::class)->create([
            'estabelecimento_id' => $estabelecimento,
            'parent_id' => $parent,
            'name' => $nome,
        ]);
        if ($parent == 0)
        {
            $extra = $this->category($estabelecimento, 'Embalagens', $category->id);
            $this->product($extra->id, 'Embalagem', '0.50', '');
        }
        return $category;
    }

    public function product($category, $nome, $price, $descricao=null)
    {
        return factory(\CodeDelivery\Models\Product::class)->create([
            'category_id' => $category,
            'name' => $nome,
            'description' => $descricao,
            'price' => $price
        ]);
    }

    public function products($category, $products)
    {
        $result = [];
        $count = count($products);
        for ($i = 0; $i < $count; $i++)
        {
            $p = $this->product($category, $products[$i]['name'], $products[$i]['price'], $products[$i]['description']);

            $result[] = $p->id;
        }
        return $result;
    }

    public function moorango()
    {
        $e = $this->estabelecimento('Morango', 'B57b4cd318f466.jpg', 1, 1);
        ///
        $category = $this->category($e->id, 'Marmitas');
        $products = [
            0 => ['name' => 'Escondidinho de batata doce com frango desfiado ao molho de espinafre', 'description' => '', 'price' => '10.00'],
            1 => ['name' => 'Escondidinho de batata doce com patinho moido ao molho de espinafre', 'description' => '', 'price' => '10.00'],
            2 => ['name' => 'Beringela parmegiana light', 'description' => '', 'price' => '10.00'],
        ];
        $this->products($category->id, $products);

        ////
        $category = $this->category($e->id, 'Omeletes');
        $products = [
            0 => ['name' => 'Mussarela, requeijão e queijo branco', 'description' => '', 'price' => '16.00'],
            1 => ['name' => 'Queijo branco, tomate e orégano', 'description' => '', 'price' => '16.00'],
            2 => ['name' => 'Queijo branco, tomate seco e rúcula', 'description' => '', 'price' => '18.00'],
            3 => ['name' => 'Queijo branco, brócolis, tomate e orégano', 'description' => '', 'price' => '18.00'],
            4 => ['name' => 'Peito de peru, queijo branco, tomate e orégano', 'description' => '', 'price' => '19.00'],
            5 => ['name' => 'Peito de peru e requeijão', 'description' => '', 'price' => '19.00'],
        ];
        $this->products($category->id, $products);
        ///
        $category = $this->category($e->id, 'Tapiocas ou Crepiocas Salgadas');
        $products = [
            0 => ['name' => 'Manteiga', 'description' => '', 'price' => '6.00'],
            1 => ['name' => 'Manteiga e Mussarela', 'description' => '', 'price' => '7.00'],
            2 => ['name' => 'Queijo branco, tomate e orégano', 'description' => '', 'price' => '8.00'],
            3 => ['name' => 'Queijo branco, tomate seco e rúcula', 'description' => '', 'price' => '9.00'],
            4 => ['name' => 'Peito de peru, queijo branco, tomate e orégano', 'description' => '', 'price' => '11.00'],
        ];
        $this->products($category->id, $products);

        ///
        $category = $this->category($e->id, 'Tapiocas ou Crepiocas Doces');
        $products = [
            0 => ['name' => 'Leite condensado com coco', 'description' => '', 'price' => '10.00'],
            1 => ['name' => 'Doce de leite', 'description' => '', 'price' => '10.00'],
            2 => ['name' => 'Banana, canela, queijo mussarela e leite condensado', 'description' => '', 'price' => '11.00'],
            3 => ['name' => 'Abacaxi, canela, queijo mussarela e leite condensado', 'description' => '', 'price' => '11.00'],
            4 => ['name' => 'Morango com leite condensado', 'description' => '', 'price' => '11.00'],
        ];
        $this->products($category->id, $products);

        ///
        $category = $this->category($e->id, 'Lanches no Pão Baguete');
        $products = [
            0 => [
                'name' => 'Churrasquinho',
                'description' => 'Pão baguete, filé mignon, cebola dourada, queijo fresco e molho de ervas',
                'price' => '23.00'
            ],
            1 => [
                'name' => 'Frangolino',
                'description' => 'Pão baguete, cubos de frango, cebola dourada, queijo fresco e molho de ervas',
                'price' => '21.00'
            ],
            2 => [
                'name' => 'Boi Soberano',
                'description' => 'Pão baguete, filé mignon, queijo gorgonzola, requeijão light e rúcula',
                'price' => '24.00'
            ],
            3 => [
                'name' => 'Galinha Moderna',
                'description' => 'Pão baguete, cubos de frango, queijo gorgonzola, requeijão light e rúcula',
                'price' => '22.00'
            ],
            4 => [
                'name' => 'Churrasalad',
                'description' => 'Pão baguete, filé mignon, cebola roxa, queijo mussarela, tomate, alface e molho defumado especial',
                'price' => '23.00'
            ],
        ];
        $this->products($category->id, $products);

        ///
        $category = $this->category($e->id, 'Sanduíche Natural no Pão Integral');
        $products = [
            0 => [
                'name' => 'Galizé',
                'description' => 'Pão integral, frango desfiado cremoso, queijo branco fresco, tomate, rúcula e cenoura ralada',
                'price' => '13.00'
            ],
            1 => [
                'name' => 'Ômega',
                'description' => 'Pão integral, atum com maionese light, tomate e cenoura ralada',
                'price' => '13.00'
            ],
            2 => [
                'name' => 'Peito de peru',
                'description' => 'Pão integral, peito de peru, requeijão light, queijo branco fresco, tomate, rúcula e cenoura ralada',
                'price' => '13.00'
            ],
        ];
        $this->products($category->id, $products);
    }

    public function divinoFogao()
    {
        $e = $this->estabelecimento('Divino Fogão', '55d0f0e7ba994.jpg', 1, 1);

        $porcaoProduct = [
            0 => ['nome' => 'Grande 2 Sabores', 'qtde' => 2],
            1 => ['nome' => 'Grande 1 Sabor', 'qtde' => 1],
            2 => ['nome' => 'Individual', 'qtde' => 1],
        ];

        $porcoes = $this->porcoes($porcaoProduct);

        $category = $this->category($e->id, 'Massas');

        $products = [
            0 => [
                'name' => 'Pizza',
                'description' => '',
                'price' => '30.00'
            ],
        ];

        $products = $this->products($category->id, $products);

        $this->makeProductsPorcoes($porcoes, $products);

        $parent = $this->category($e->id, 'Sabores de Pizza', $category->id);
        $products = [
            0 => [
                'name' => 'Calabresa',
                'description' => 'Molho de tomate, mussarela, calabresa, cebola e orégano',
                'price' => '34.99'
            ],
            1 => [
                'name' => 'Margherita',
                'description' => 'Molho de tomate, mussarela, tomate e manjericão',
                'price' => '34.90'
            ],
            2 => [
                'name' => 'Carne de Sol',
                'description' => 'Molho de tomate, mussarela, carne de sol desfiada, cebola e catupiry',
                'price' => '37.99'
            ],
            3 => [
                'name' => 'Divina',
                'description' => '',
                'price' => '37.99'
            ],
            4 => [
                'name' => 'Frango com Catupiry',
                'description' => 'Molho de tomate, mussarela, frango desfiado, catupiry e orégano',
                'price' => '37.99'
            ],
            5 => [
                'name' => 'Lombinho',
                'description' => 'Molho de tomate, mussarela, lombo canadense defumado, catupiry e orégano.',
                'price' => '37.99'
            ],
        ];

        $products = $this->products($parent->id, $products);

        $this->makeProductsPorcoes($porcoes, $products);

        $this->makeCategoriesPorcoes($porcaoProduct, $porcoes, $parent->id);

        $parent = $this->category($e->id, 'Bordas', $category->id);
        $products = [
            0 => [
                'name' => 'Cheddar',
                'description' => '',
                'price' => '2.00'
            ],
            1 => [
                'name' => '4 Queijos',
                'description' => '',
                'price' => '2.50'
            ],
            2 => [
                'name' => 'Catupiry',
                'description' => '',
                'price' => '3.50'
            ],
        ];
        $this->products($parent->id, $products);
    }

    public function rosario()
    {
        $e = $this->estabelecimento('Drogaria Rosário', 'rosario.jpg', 2, 1);
        ///
        $category = $this->category($e->id, 'Higiene Pessoal');
        $products = [
            0 => ['name' => 'Absorvente Biofral Maxi', 'description' => '', 'price' => '14.99'],
            1 => ['name' => 'Antisséptico Bucal Colgate Pax 500ml', 'description' => '', 'price' => '12.99'],
            2 => ['name' => 'Creme Dental Colgate Sensitive Pró Alívio 110g', 'description' => '', 'price' => '13.99'],
            3 => ['name' => 'Desodorante Dove Aerosol 169 ml e 85 ml', 'description' => '', 'price' => '15.99'],
            4 => ['name' => 'Desodorante Rexona Aerosol 179 ml e 85 mil', 'description' => '', 'price' => '13.99'],
            5 => ['name' => 'Escova Dental Curaprox 5460 Ultra Macia', 'description' => '', 'price' => '24.99'],
            6 => ['name' => 'Fralda Adulta Sensaty', 'description' => '', 'price' => '16.99'],
            7 => ['name' => 'Fralda Adulta', 'description' => '', 'price' => '15.99'],
        ];
        $this->products($category->id, $products);

        ////
        $category = $this->category($e->id, 'Medicamentos');
        $products = [
            0 => ['name' => 'Cimegripe c/ 20 cáps', 'description' => '', 'price' => '9.99'],
            1 => ['name' => 'Probentol Derma Solução 50 ml', 'description' => '', 'price' => '23.99'],
            2 => ['name' => 'Probentol Derma Spray 50 ml', 'description' => '', 'price' => '23.99'],
            3 => ['name' => 'Vitergyl C 3 Tubos c/ 10 comp. cada', 'description' => '', 'price' => '17.99'],
            4 => ['name' => 'Peito de peru, queijo branco, tomate e orégano', 'description' => '', 'price' => '19.00'],
        ];
        $this->products($category->id, $products);
        ///
        $category = $this->category($e->id, 'Diversos');
        $products = [
            0 => ['name' => 'Aparelho de Pressão Arterial Digital Automático Techline', 'description' => '', 'price' => '154.99'],
            1 => ['name' => 'Claricure Creme 60 g', 'description' => '', 'price' => '42.40'],
            2 => ['name' => 'Fralda Enxutita', 'description' => '', 'price' => '27.99'],
            3 => ['name' => 'Lavita Beauty c/ 30 comp.', 'description' => '', 'price' => '34.89'],
        ];
        $this->products($category->id, $products);
    }

    public function makeCategoriesPorcoes($porcaoProduct, $porcoes, $categoria)
    {
        $pc = count($porcaoProduct);
        $p = count($porcoes);

        if ($pc == $p && $p > 0)
        {
            for ($i = 0; $i < $pc; $i++)
            {
                factory(\CodeDelivery\Models\CategoryPorcao::class)->create([
                    'porcao_id' => $porcoes[$i],
                    'category_id' => $categoria,
                    'qtde' => $porcaoProduct[$i]['qtde'],
                ]);
            }
        }
    }

    /**
     * @param $porcaoProduct
     */
    public function porcoes($porcaoProduct)
    {
        $count = count($porcaoProduct);
        $result = [];
        if ($count > 0) {
            for ($i = 0; $i < $count; $i++) {
                try {
                    $r = \CodeDelivery\Models\Porcao::where('nome', '=', $porcaoProduct[$i]['nome'])->firstOrFail();
                } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                    $r = factory(\CodeDelivery\Models\Porcao::class)->create([
                        'nome' => $porcaoProduct[$i]['nome'],
                    ]);
                }
                $result[] = $r->id;
            }
        }
        return $result;
    }

    /**
     * @param $porcoes
     * @param $return
     */
    public function makeProductsPorcoes($porcoes, $products)
    {
        $countPorcoes = count($porcoes);
        $countProducts = count($products);

        for ($i=0; $i < $countPorcoes; $i++)
        {
            for ($j=0; $j < $countProducts; $j++)
            {
                factory(\CodeDelivery\Models\ProductPorcao::class)->create([
                    'product_id' => $products[$j],
                    'porcao_id' => $porcoes[$i],
                    'preco' => random_int(25,50)
                ]);
            }
        }
    }
}
