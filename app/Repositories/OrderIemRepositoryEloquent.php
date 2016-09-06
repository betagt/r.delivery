<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\OrderIemRepository;
use CodeDelivery\Models\OrderIem;
use CodeDelivery\Validators\OrderIemValidator;

/**
 * Class OrderIemRepositoryEloquent
 * @package namespace App\Repositories;
 */
class OrderIemRepositoryEloquent extends BaseRepository implements OrderIemRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OrderIem::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
