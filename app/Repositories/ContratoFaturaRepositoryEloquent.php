<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\ContratoFaturaRepository;
use CodeDelivery\Models\ContratoFatura;
use CodeDelivery\Validators\ContratoFaturaValidator;

/**
 * Class ContratoFaturaRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class ContratoFaturaRepositoryEloquent extends BaseRepository implements ContratoFaturaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ContratoFatura::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
