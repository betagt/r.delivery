<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface GeoPositionRepository
 * @package namespace CodeDelivery\Repositories;
 */
interface GeoPositionRepository extends RepositoryInterface
{
   public function getPosition($latLongOrigins,$latLongDestinos);
}
