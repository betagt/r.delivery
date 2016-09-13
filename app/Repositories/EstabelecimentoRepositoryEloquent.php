<?php

namespace CodeDelivery\Repositories;

use CodeDelivery\Presenters\EstabelecimentoPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Models\Estabelecimento;
use CodeDelivery\Validators\EstabelecimentoValidator;

/**
 * Class EstabelecimentoRepositoryEloquent
 * @package namespace App\Repositories;
 */
class EstabelecimentoRepositoryEloquent extends BaseRepository implements EstabelecimentoRepository
{

    protected $skipPresenter = true;

    protected $fieldSearchable = [
        'endereco.cidade' => 'like',
        'endereco.estado' => 'like',
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Estabelecimento::class;
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
        return EstabelecimentoPresenter::class;
    }
}
