<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\ContratoRepository;
use CodeDelivery\Models\Contrato;
use CodeDelivery\Validators\ContratoValidator;

/**
 * Class ContratoRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class ContratoRepositoryEloquent extends BaseRepository implements ContratoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Contrato::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
