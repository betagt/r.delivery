<?php

namespace CodeDelivery\Repositories;

use CodeDelivery\Models\Assunto;
use CodeDelivery\Repositories\AssuntoRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class AssuntoRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class AssuntoRepositoryEloquent extends BaseRepository implements AssuntoRepository {

	protected $skipPresenter = true;

	protected $fieldSearchable = [
		'name' => 'like',
		'email' => '=',
	];

	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model() {
		return Assunto::class;
	}

	/**
	 * Boot up the repository, pushing criteria
	 */
	public function boot() {
		$this->pushCriteria(app(RequestCriteria::class));
	}
}
