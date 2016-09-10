<?php

namespace CodeDelivery\Repositories;

use CodeDelivery\Models\AssuntoContatos;
use CodeDelivery\Repositories\AssuntoContatosRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class AssuntoContatosRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class AssuntoContatosRepositoryEloquent extends BaseRepository implements AssuntoContatosRepository {

	protected $skipPresenter = true;

	protected $fieldSearchable = [
		'assunto.name' => 'like',
		'name' => 'like',
	];

	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model() {
		return AssuntoContatos::class;
	}

	/**
	 * Boot up the repository, pushing criteria
	 */
	public function boot() {
		$this->pushCriteria(app(RequestCriteria::class));
	}
}
