<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\ProductExtraItemRepository;
use CodeDelivery\Models\ProductExtraItem;
use CodeDelivery\Validators\ProductExtraItemValidator;

/**
 * Class ProductExtraItemRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class ProductExtraItemRepositoryEloquent extends BaseRepository implements ProductExtraItemRepository
{
    protected $skipPresenter = false;

    protected $fieldSearchable = [
        'extra.name' => 'like',
        'name' => 'like'
    ];
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProductExtraItem::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
