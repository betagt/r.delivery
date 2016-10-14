<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\PorcaoRepository;
use CodeDelivery\Models\Porcao;
use CodeDelivery\Validators\PorcaoValidator;

/**
 * Class PorcaoRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class PorcaoRepositoryEloquent extends BaseRepository implements PorcaoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Porcao::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
