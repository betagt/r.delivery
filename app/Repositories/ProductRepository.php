<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ProductRepository
 * @package namespace App\Repositories;
 */
interface ProductRepository extends RepositoryInterface
{
    public function getProducts();

    public function getLista();
}
