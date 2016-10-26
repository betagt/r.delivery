<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\CategoryPorcaoRepository;
use CodeDelivery\Models\CategoryPorcao;
use CodeDelivery\Validators\CategoryPorcaoValidator;

/**
 * Class CategoryPorcaoRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class CategoryPorcaoRepositoryEloquent extends BaseRepository implements CategoryPorcaoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CategoryPorcao::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
