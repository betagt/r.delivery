<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\ProductExtraRepository;
use CodeDelivery\Models\ProductExtra;
use CodeDelivery\Validators\ProductExtraValidator;

/**
 * Class ProductExtraRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class ProductExtraRepositoryEloquent extends BaseRepository implements ProductExtraRepository
{
    protected $skipPresenter = true;

    protected $fieldSearchable = [
        'product.name' => 'like',
        'category_extra.name' => 'like'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProductExtra::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
