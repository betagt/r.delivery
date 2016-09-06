<?php

namespace CodeDelivery\Repositories;

use CodeDelivery\Presenters\OrderPresenter;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Models\Order;
use CodeDelivery\Validators\OrderValidator;

/**
 * Class OrderRepositoryEloquent
 * @package namespace App\Repositories;
 */
class OrderRepositoryEloquent extends BaseRepository implements OrderRepository
{

    protected $skipPresenter = true;

    protected $fieldSearchable = [
        'client.user.name' => 'like',
        'deliveryman.name' => 'like'
    ];


    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Order::class;
    }

    public function getByIdAndDeliveryman($id,$idDeliveryman){
        $result =  $this->model
                        ->where('id',$id)
                        ->where('user_deliveryman_id',$idDeliveryman)
                        ->first();
        if($result){
            return $this->parserResult($result);
        }

        throw new ModelNotFoundException('Order não existe');

    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter()
    {
        return OrderPresenter::class;
    }
}
