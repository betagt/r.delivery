<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\ProductPorcaoCategoryRepository;
use CodeDelivery\Models\ProductPorcaoCategory;
use CodeDelivery\Validators\ProductPorcaoCategoryValidator;

/**
 * Class ProductPorcaoCategoryRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class ProductPorcaoCategoryRepositoryEloquent extends BaseRepository implements ProductPorcaoCategoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProductPorcaoCategory::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
