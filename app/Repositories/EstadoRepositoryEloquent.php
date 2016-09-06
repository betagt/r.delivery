<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\EstadoRepository;
use CodeDelivery\Models\Estado;
use CodeDelivery\Validators\EstadoValidator;

/**
 * Class EstadoRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class EstadoRepositoryEloquent extends BaseRepository implements EstadoRepository
{
    protected $skipPresenter = true;

    protected $fieldSearchable = [
        'estado' => 'like',
        'uf' => '='
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Estado::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
