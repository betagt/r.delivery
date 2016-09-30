<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\ProductPorcaoRepository;
use CodeDelivery\Models\ProductPorcao;
use CodeDelivery\Validators\ProductPorcaoValidator;

/**
 * Class ProductPorcaoRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class ProductPorcaoRepositoryEloquent extends BaseRepository implements ProductPorcaoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProductPorcao::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
