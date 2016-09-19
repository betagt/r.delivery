<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Models\PorcaoCategoryProduct;
use CodeDelivery\Validators\PorcaoCategoryProductValidator;

/**
 * Class PorcaoCategoryProductRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class PorcaoCategoryProductRepositoryEloquent extends BaseRepository implements PorcaoCategoryProductRepository
{
    protected $fieldSearchable = [
        'product.name' => 'like'
    ];

    protected $skipPresenter = true;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PorcaoCategoryProduct::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
