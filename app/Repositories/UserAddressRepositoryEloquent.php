<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\UserAddressRepository;
use CodeDelivery\Models\UserAddress;
use CodeDelivery\Validators\UserAddressValidator;

/**
 * Class UserAddressRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class UserAddressRepositoryEloquent extends BaseRepository implements UserAddressRepository
{
    protected $skipPresenter = true;

    protected $fieldSearchable = [
        'user.name' => 'like',
        'neighborhood' => '=',
        'city' => '=',
        'state' => '=',
        'address' => 'like'
    ];
    
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserAddress::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
