<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\CidadeRepository;
use CodeDelivery\Models\Cidade;
use CodeDelivery\Validators\CidadeValidator;

/**
 * Class CidadeRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class CidadeRepositoryEloquent extends BaseRepository implements CidadeRepository
{
    protected $skipPresenter = true;

    protected $fieldSearchable = [
        'nome' => 'like',
        'estado.nome' => 'like',
        'estado.uf' => '='
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Cidade::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
