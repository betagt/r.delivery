<?php

namespace CodeDelivery\Repositories;

use CodeDelivery\Presenters\ProductPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Models\Product;
use CodeDelivery\Validators\ProductValidator;

/**
 * Class ProductRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ProductRepositoryEloquent extends BaseRepository implements ProductRepository
{

    protected $skipPresenter = true;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
    }

    public function getProducts()
    {
        $collection = $this->model->orderBy('name', 'asc')->lists('name', 'id');

        $result = [];
        $i = 0;
        foreach ($collection as $key => $value)
        {
            if ($i == 0)
            {
                $result[0] = 'Produto Responsável';
                $i++;
            }
            $result[$key] = $value;
        }

        return $result;
    }

    public function getLista(){
        return $this->model->get(['id','name','price']);
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
        return ProductPresenter::class;
    }


}
