<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\EstabelecimentoEntregadorRepository;
use CodeDelivery\Models\EstabelecimentoEntregador;
use CodeDelivery\Validators\EstabelecimentoEntregadorValidator;

/**
 * Class EstabelecimentoEntregadorRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class EstabelecimentoEntregadorRepositoryEloquent extends BaseRepository implements EstabelecimentoEntregadorRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return EstabelecimentoEntregador::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
