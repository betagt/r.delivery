<?php

namespace CodeDelivery\Repositories;

use CodeDelivery\Presenters\EstabelecimentoCategoriaPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\EstabelecimentoCategoriaRepository;
use CodeDelivery\Models\EstabelecimentoCategoria;
use CodeDelivery\Validators\EstabelecimentoCategoriaValidator;

/**
 * Class EstabelecimentoCategoriaRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class EstabelecimentoCategoriaRepositoryEloquent extends BaseRepository implements EstabelecimentoCategoriaRepository
{
    protected $skipPresenter = true;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return EstabelecimentoCategoria::class;
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
        return EstabelecimentoCategoriaPresenter::class;
    }
}
