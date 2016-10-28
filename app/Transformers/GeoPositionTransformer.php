<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\GeoPosition;

/**
 * Class GeoPositionTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class GeoPositionTransformer extends TransformerAbstract
{

    /**
     * Transform the \GeoPosition entity
     * @param \GeoPosition $model
     *
     * @return array
     */
    public function transform(GeoPosition $model)
    {
        return [
            'id'         => (int) $model->id,
            'lat_log_origens'         => (string) $model->lat_log_origens,
            'lat_log_destinos'         => (string) $model->lat_log_destinos,
            'price'         => (float) $model->price,
            'price_label'         => number_format($model->price,2,',','.'),

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
