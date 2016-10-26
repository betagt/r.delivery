<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\CategoryRepository;

class TestController extends Controller
{
    /**
     * @var CategoryRepository
     */
    private $repository;

    /**
     * TestController constructor.
     */
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $result = $this->mountTree(2, 0);

        return $result;
    }

    public function getCategories($id, $parent)
    {
        return $this->repository->skipPresenter(true)->getCategories($id, $parent);
    }

    public function mountTree($id, $parent)
    {
        $categories = $this->getCategories($id, $parent);

        $count = count($categories);
        $result = [];
        if ($count > 0)
        {
            for($i=0; $i < $count; $i++)
            {
                $result[$i] = $categories[$i];
                if ($result[$i]->children())
                {
                    $result[$i]['children'] = $this->mountTree($id, $result[$i]->id);
                }
            }
        }
        return $result;
    }

//    public function getItems($items)
//    {
//        $result = [];
//        foreach ($items as $item) {
//            $this->mountIntersection($item, $result);
//        }
//
//        $this->calcPrice($result);
//
//        $result = $this->reagruparArray($result);
//
//        $count = count($items);
//        $countResult = count($result);
//        for ($i = 0; $i < $count; $i++) {
//            for ($j = 0; $j < $countResult; $j++) {
//                if ($items[$i]['product_id'] == $result[$j]['product_id']) {
//                    $items[$i]['price'] = $result[$j]['price'];
//                }
//            }
//        }
//        return $items;
//    }
//
//    public function mountIntersection($item, &$result)
//    {
//        if ($item['product_porcao_id'] == 0) {
//            return;
//        }
//        $index = $item['product_porcao_id'];
//        $result[$index][] = $item;
//    }
//
//    public function calcPrice(&$result)
//    {
//        $count = count($result);
//        if ($count == 0) {
//            return;
//        }
//        $keys = array_keys($result);
//        $countIndex = count($keys);
//
//        for ($k = 0; $k < $countIndex; $k++) {
//            $price = $this->maxValueInArray($result[$keys[$k]], 'price');
//
//            $countK = count($result[$keys[$k]]);
//            for ($i = 0; $i < $countK; $i++) {
//                if ($i == 0) {
//                    $result[$keys[$k]][$i]['price'] = $price;
//                } else {
//                    $result[$keys[$k]][$i]['price'] = 0;
//                }
//            }
//        }
//    }
//
//    public function reagruparArray($items)
//    {
//        $result = [];
//        $keys = array_keys($items);
//        $countKeys = count($keys);
//        for ($i = 0; $i < $countKeys; $i++) {
//            $countItem = count($items[$keys[$i]]);
//            for ($j = 0; $j < $countItem; $j++) {
//                $result[] = $items[$keys[$i]][$j];
//            }
//        }
//        return $result;
//    }
//
//    public function maxValueInArray($array, $keyToSearch)
//    {
//        $currentMax = NULL;
//        foreach ($array as $arr) {
//            foreach ($arr as $key => $value) {
//                if ($key == $keyToSearch && ($value >= $currentMax)) {
//                    $currentMax = $value;
//                }
//            }
//        }
//        return $currentMax;
//    }


//    private function getAvaliacoes($idEstabelecimento)
//    {
//        $avaliacoes = $this->repository->findWhere(['status' => 1])->all();
//
//        $result = [];
//        foreach ($avaliacoes as $item) {
//            $result[] = [
//                'nota' => $this->getMedia($idEstabelecimento, $item->id),
//                'questao' => $item->questao,
//            ];
//        }
//        return [ 'data' =>  $result ];
//    }
//
//    private function getMedia($idEstabelecimento, $id)
//    {
//        $data = DB::table('order_avaliacao_item')
//            ->join('orders_avaliacoes', 'order_avaliacao_item.order_avaliacao_id', '=', 'orders_avaliacoes.id' )
//            ->join('orders', 'orders_avaliacoes.order_id', '=', 'orders.id' )
//            ->select('order_avaliacao_item.*')
//            ->where('order_avaliacao_item.avaliacao_id', $id)
//            ->where('orders.estabelecimento_id', $idEstabelecimento)
//            ->get()
//        ;
//
//        if (empty($data))
//        {
//            return 0;
//        }
//
//        $nota = 0;
//        $i = 0;
//        foreach ($data as $item) {
//            $nota += $item->nota;
//            $i++;
//        }
//
//        return $nota / $i;
//    }

//    public function index()
//    {
//        $user = User::find(1);
//
//        return $user;
//
//        $data = DB::select('select * from users where id = :id', ['id' => 1]);
//        return $data[0]->id;
//    }


}
