<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\PlanoRepository;
use CodeDelivery\Models\Plano;
use CodeDelivery\Validators\PlanoValidator;

/**
 * Class PlanoRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class PlanoRepositoryEloquent extends BaseRepository implements PlanoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Plano::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
