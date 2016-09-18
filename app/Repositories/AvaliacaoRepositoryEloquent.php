<?php

namespace CodeDelivery\Repositories;

use CodeDelivery\Presenters\AvaliacaoPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Models\Avaliacao;
use CodeDelivery\Validators\AvaliacaoValidator;

/**
 * Class AvaliacaoRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class AvaliacaoRepositoryEloquent extends BaseRepository implements AvaliacaoRepository
{
    protected $skipPresenter = true;

    protected $fieldSearchable = [
        'questao' => 'like'
    ];
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Avaliacao::class;
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
        return AvaliacaoPresenter::class;
    }
}
