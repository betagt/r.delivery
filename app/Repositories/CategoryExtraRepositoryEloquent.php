<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Models\CategoryExtra;
use CodeDelivery\Validators\CategoryExtraValidator;

/**
 * Class CategoryExtrasRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class CategoryExtraRepositoryEloquent extends BaseRepository implements CategoryExtrasRepository
{
    protected $skipPresenter = true;

    protected $fieldSearchable = [
        'name' => 'like', 'category.name' => 'like'
    ];
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CategoryExtras::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
