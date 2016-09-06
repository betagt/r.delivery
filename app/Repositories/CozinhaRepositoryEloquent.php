<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\CozinhaRepository;
use CodeDelivery\Models\Cozinha;
use CodeDelivery\Validators\CozinhaValidator;

/**
 * Class CozinhaRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class CozinhaRepositoryEloquent extends BaseRepository implements CozinhaRepository
{
    protected $skipPresenter = true;

    protected $fieldSearchable = [
        'nome' => 'like'
    ];
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Cozinha::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
