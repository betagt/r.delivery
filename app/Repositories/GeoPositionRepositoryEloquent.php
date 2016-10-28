<?php

namespace CodeDelivery\Repositories;

use CodeDelivery\Presenters\GeoPositionPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\GeoPositionRepository;
use CodeDelivery\Models\GeoPosition;
use CodeDelivery\Validators\GeoPositionValidator;

/**
 * Class GeoPositionRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class GeoPositionRepositoryEloquent extends BaseRepository implements GeoPositionRepository
{
    protected $skipPresenter = true;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return GeoPosition::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getPosition($latLongOrigins, $latLongDestinos)
    {
        $result =  $this->model
            ->where('lat_log_origens', $latLongOrigins)
            ->where('lat_log_destinos', $latLongDestinos)
            ->first();
        if($result){
            return $this->parserResult($result);
        }
        return null;
    }

    public function presenter()
    {
        return GeoPositionPresenter::class;
    }
}
