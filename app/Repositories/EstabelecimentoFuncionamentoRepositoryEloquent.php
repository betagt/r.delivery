<?php

namespace CodeDelivery\Repositories;

use CodeDelivery\Presenters\EstabelecimentoFuncionamentoPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Models\EstabelecimentoFuncionamento;
use CodeDelivery\Validators\EstabelecimentoFuncionamentoValidator;

/**
 * Class EstabelecimentoFuncionamentoRepositoryEloquent
 * @package namespace App\Repositories;
 */
class EstabelecimentoFuncionamentoRepositoryEloquent extends BaseRepository implements EstabelecimentoFuncionamentoRepository
{

    protected $skipPresenter = true;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return EstabelecimentoFuncionamento::class;
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
        return EstabelecimentoFuncionamentoPresenter::class;
    }
}
