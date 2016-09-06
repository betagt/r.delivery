<?php

namespace CodeDelivery\Repositories;

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
}
