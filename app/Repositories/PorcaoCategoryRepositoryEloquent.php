<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Models\PorcaoCategory;
use CodeDelivery\Validators\PorcaoCategoryValidator;

/**
 * Class PorcaoCategoryRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class PorcaoCategoryRepositoryEloquent extends BaseRepository implements PorcaoCategoryRepository
{
    protected $fieldSearchable = [
        'category.name' => 'like'
    ];

    protected $skipPresenter = true;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PorcaoCategory::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
