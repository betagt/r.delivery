<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface UserRepository
 * @package namespace App\Repositories;
 */
interface UserRepository extends RepositoryInterface
{
    public function updateDeviceToken($id,$devicetoken);
    public function updateFone($id,$ddd,$telefoneCelular);
}
