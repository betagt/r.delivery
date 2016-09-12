<?php
/**
 * Created by PhpStorm.
 * User: dsoft
 * Date: 09/08/2016
 * Time: 00:18
 */

namespace CodeDelivery\Services;


use CodeDelivery\Models\Order;
use CodeDelivery\Repositories\CupomRepository;
use CodeDelivery\Repositories\OrderRepository;
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

    public function __construct(
        OrderRepository $orderRepository,
        CupomRepository $cupomRepository,
        ProductRepository $productRepository,
        PushProcessor $pushProcessor
    )
    {
        $this->orderRepository = $orderRepository;
        $this->cupomRepository = $cupomRepository;
        $this->productRepository = $productRepository;
        $this->pushProcessor = $pushProcessor;
    }

    public function create($data)
    {
        DB::beginTransaction();
        try {
            $data['status'] = 0;
            if (isset($data['cupom_id'])) {
                unset($data['cupom_id']);
            }
            if (isset($data['cupom_code'])) {
                $cupom = $this->cupomRepository->findByField('code', $data['cupom_code'])->first();
                $data['cupom_id'] = $cupom->id;
                $cupom->used = 1;
                $cupom->save();
                unset($data['cupom_code']);
            }
            $items = $data['items'];
            unset($data['items']);

            $order = $this->orderRepository->create($data);
            $total = 0;
            foreach ($items as $item) {
                $item['price'] = $this->productRepository->find($item['product_id'])->price;
                $order->items()->create($item);
                $total = $item['price'] * $item['qtd'];
            }
            $order->total = $total;
            if (isset($cupom)) {
                $order->total = $total - $cupom->value;
            }
            $order->save();

            DB::insert(
                'INSERT INTO order_delivery_addresses (order_id, user_address_id) VALUES (?, ?)',
                [ $order->id, $data['user_delivery_id']]
            );

            DB::commit();
            return $order;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
    public function show($id){
        $order = $this->orderRepository->skipPresenter(false)->find($id);
        $order['data']['endereco'] = $order['data']['endereco']->first();
        return $order;
    }
    public function updateStatus($id,$idDeliveryman,$status){
        $order = $this->orderRepository->getByIdAndDeliveryman($id,$idDeliveryman);
        $order->status = $status;
        switch ((int)$order->status) {
            case 1:
                if( !$order->hash) {
                    $order->hash = md5((new \DateTime())->getTimestamp());
                }
                $order->save();
                break;
            case 2:
                $user = $order->client->user;
                $this->pushProcessor->notify([$user->device_token],[
                    'message'=>"Seu Pedido #".$order->id." acabou de ser entregue"
                ]);
                $order->save();
                break;
        }
        return $order;
    }
}