<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\EstabelecimentoAvaliacaoRepository;
use CodeDelivery\Models\EstabelecimentoAvaliacao;
use CodeDelivery\Validators\EstabelecimentoAvaliacaoValidator;

/**
 * Class EstabelecimentoAvaliacaoRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class EstabelecimentoAvaliacaoRepositoryEloquent extends BaseRepository implements EstabelecimentoAvaliacaoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return EstabelecimentoAvaliacao::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
