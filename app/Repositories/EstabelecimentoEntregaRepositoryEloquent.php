<?php

namespace CodeDelivery\Repositories;

use CodeDelivery\Presenters\EstabelecimentoEntregaPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Models\EstabelecimentoEntrega;
use CodeDelivery\Validators\EstabelecimentoEntregaValidator;

/**
 * Class EstabelecimentoEntregaRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class EstabelecimentoEntregaRepositoryEloquent extends BaseRepository implements EstabelecimentoEntregaRepository
{

    protected $skipPresenter = true;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return EstabelecimentoEntrega::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter()
    {
        return EstabelecimentoEntregaPresenter::class;
    }
}
