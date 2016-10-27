<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\EstabelecimentoConfiguracaoRepository;
use CodeDelivery\Models\EstabelecimentoConfiguracao;
use CodeDelivery\Validators\EstabelecimentoConfiguracaoValidator;

/**
 * Class EstabelecimentoConfiguracaoRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class EstabelecimentoConfiguracaoRepositoryEloquent extends BaseRepository implements EstabelecimentoConfiguracaoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return EstabelecimentoConfiguracao::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
