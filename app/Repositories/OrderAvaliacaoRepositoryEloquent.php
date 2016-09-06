<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Models\OrderAvaliacao;
use CodeDelivery\Validators\OrderAvaliacaoValidator;

/**
 * Class OrderAvaliacaoRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class OrderAvaliacaoRepositoryEloquent extends BaseRepository implements OrderAvaliacaoRepository
{

    protected $skipPresenter = true;

    protected $fieldSearchable = [
        'order_id',
        'order.client.user.name' => 'like',
        'order.estabelecimento.nome' => 'like',
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OrderAvaliacao::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
