<?php
/**
 * Created by PhpStorm.
 * User: dsoft
 * Date: 09/08/2016
 * Time: 00:18
 */

namespace CodeDelivery\Services;


use CodeDelivery\Models\Cupom;
use CodeDelivery\Models\Order;
use CodeDelivery\Repositories\CupomRepository;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductPorcaoRepository;
use CodeDelivery\Repositories\ProductRepository;
use Dmitrovskiy\IonicPush\PushProcessor;
use Illuminate\Support\Facades\DB;

class OrderService
{
    /**
     * @var OrderRepository
     */
    private $orderRepository;
    /**
     * @var CupomRepository
     */
    private $cupomRepository;
    /**
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var PushProcessor
     */
    private $pushProcessor;
    /**
     * @var ProductPorcaoRepository
     */
    private $porcaoRepository;

    public function __construct(
        OrderRepository $orderRepository,
        CupomRepository $cupomRepository,
        ProductRepository $productRepository,
        PushProcessor $pushProcessor,
        ProductPorcaoRepository $porcaoRepository
    )
    {
        $this->orderRepository = $orderRepository;
        $this->cupomRepository = $cupomRepository;
        $this->productRepository = $productRepository;
        $this->pushProcessor = $pushProcessor;
        $this->porcaoRepository = $porcaoRepository;
    }

    public function create($data)
    {
        DB::beginTransaction();
        try {
            $data['status'] = 0;
            $cupom = null;
            if (isset($data['cupom_id'])) {
                unset($data['cupom_id']);
            }
            if (isset($data['cupom_code'])) {
                $cupom = $this->cupomRepository->findByField('code', $data['cupom_code'])->first();

                $check = DB::select('select * from user_cupoms where user_id = ? AND cupom_id = ?', [$data['client_id'], $cupom->id]);
                if ($check) {
                    abort(300, 'Esse cupom não pode ser utilizado uma seugnda vez');
                }
                unset($data['cupom_code']);
            }

            //$data['items'] = $this->getItems($data['items']);
            $order = $this->orderRepository->create($data);
            $total = $data['total'] ;
            $order->taxa_entrega = $data['taxa'];

            foreach ($data['items'] as $key =>$item) {
                $order->items()->create($item);
                //$total += $item['price'] * $item['qtd'];
            }
            //$order->total = $total;
            if (isset($cupom)) {
                $order->total = $data['taxa'] + $total - $cupom->value;
            }
            $order->save();

            DB::insert(
                'INSERT INTO order_delivery_addresses (order_id, user_address_id) VALUES (?, ?)',
                [$order->id, $data['user_delivery_id']]
            );

            if ($cupom) {
                DB::insert(
                    'INSERT INTO user_cupoms (user_id, cupom_id) VALUES (?, ?)',
                    [$order->client_id, $cupom->id]
                );
            }

            DB::commit();
            return $order;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function getItems($items){
        $arr_pai = array_filter($items,function ($var) use ($items){
            return $var["product_extra_id"]== 0;
        });
        $todosfilhos = [];
        foreach ($arr_pai as $key=>$value){
            $id = $arr_pai[$key]['id'];
            $arr_pai[$key]['price'] = $this->checkPrice($arr_pai[$key]);
            $arr_filho = array_filter($items,function ($var) use ($id){
                return $var["product_extra_id"]== $id;
            });
            foreach ($arr_filho as $index => $val){
                $aux = $arr_pai[$key]['price'];
                $arr_filho[$index]['price'] = $this->checkPrice($arr_filho[$index]);
                if($arr_filho[$index]['price'] > $aux){
                    $aux = $arr_filho[$index]['price'];
                    $arr_pai[$key]['price'] = $aux;
                    $arr_pai[$key]['price_label'] = $arr_filho[$index]['price_label'];
                }
                $arr_filho[$index]['price'] = 0;
                $arr_filho[$index]['price_label'] = "0,00";
            }
            $todosfilhos = array_merge($arr_filho,$todosfilhos);
        }
        return array_merge($arr_pai,$todosfilhos);
    }

    private function checkPrice($item){
        if(!isset($item['porcao_id'])){
            $item['porcao_id'] = 0;
        }
        if ($item['porcao_id'] > 0)
        {
            return $this->porcaoRepository->findWhere(['product_id' => $item['id'], 'porcao_id' => $item['porcao_id']])->first()->preco;
        } else {
            return  $this->productRepository->find($item['product_id'])->price;
        }
    }

    /*public function getItems_antigo($items)
    {
        $result = [];
        foreach ($items as $item) {
            $this->mountIntersection($item, $result);
        }

        $this->calcPrice($result);

        $result = $this->reagruparArray($result);

        $count = count($items);
        $countResult = count($result);
        for ($i = 0; $i < $count; $i++) {
            for ($j = 0; $j < $countResult; $j++) {
                if ($items[$i]['product_id'] == $result[$j]['product_id']) {
                    $items[$i]['price'] = $result[$j]['price'];
                }
            }
        }
        return $items;
    }

    public function mountIntersection($item, &$result)
    {
        if(!isset($item['porcao_id'])){
            return;
        }
        if ($item['porcao_id'] == 0) {
            return;
        }
        $index = $item['porcao_id'];
        $result[$index][] = $item;
    }*/

    /*public function calcPrice(&$result)
    {
        $count = count($result);
        if ($count == 0) {
            return;
        }
        $keys = array_keys($result);
        $countIndex = count($keys);

        for ($k = 0; $k < $countIndex; $k++) {
            $price = $this->maxValueInArray($result[$keys[$k]], 'price');

            $countK = count($result[$keys[$k]]);
            for ($i = 0; $i < $countK; $i++) {
                if ($i == 0) {
                    $result[$keys[$k]][$i]['price'] = $price;
                } else {
                    $result[$keys[$k]][$i]['price'] = 0;
                }
            }
        }
    }*/

    /*public function reagruparArray($items)
    {
        $result = [];
        $keys = array_keys($items);
        $countKeys = count($keys);
        for ($i = 0; $i < $countKeys; $i++) {
            $countItem = count($items[$keys[$i]]);
            for ($j = 0; $j < $countItem; $j++) {
                $result[] = $items[$keys[$i]][$j];
            }
        }
        return $result;
    }*/

    /*public function maxValueInArray($array, $keyToSearch)
    {
        $currentMax = NULL;
        foreach ($array as $arr) {
            foreach ($arr as $key => $value) {
                if ($key == $keyToSearch && ($value >= $currentMax)) {
                    $currentMax = $value;
                }
            }
        }
        return $currentMax;
    }*/

    public function show($id)
    {
        $order = $this->orderRepository->skipPresenter(false)->find($id);
        $order['data']['endereco'] = $order['data']['endereco']->first();
        return $order;
    }

    public function updateStatus($id, $idDeliveryman, $status)
    {
        $order = $this->orderRepository->getByIdAndDeliveryman($id, $idDeliveryman);
        $order->status = $status;
        switch ((int)$order->status) {
            case 1:
                if (!$order->hash) {
                    $order->hash = md5((new \DateTime())->getTimestamp());
                }
                $order->save();
                break;
            case 2:
                $user = $order->client;
                $this->pushProcessor->notify([$user->device_token], [
                    'title' => "<b>Entrega</b>",
                    'message' => "<b>Seu Pedido: #" . $order->id . "</b> acabou de ser iniciada a entrega"
                ]);
                $order->save();
                break;
        }
        return $order;
    }
}