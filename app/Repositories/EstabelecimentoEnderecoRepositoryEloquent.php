<?php

namespace CodeDelivery\Repositories;

use CodeDelivery\Presenters\EstabelecimentoEnderecoPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Models\EstabelecimentoEndereco;
use CodeDelivery\Validators\EstabelecimentoEnderecoValidator;

/**
 * Class EstabelecimentoEnderecoRepositoryEloquent
 * @package namespace App\Repositories;
 */
class EstabelecimentoEnderecoRepositoryEloquent extends BaseRepository implements EstabelecimentoEnderecoRepository
{

    protected $skipPresenter = true;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return EstabelecimentoEndereco::class;
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
        return EstabelecimentoEnderecoPresenter::class;
    }
}
