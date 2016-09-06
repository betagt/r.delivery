<?php

namespace CodeDelivery\Repositories;

use CodeDelivery\Presenters\CategoryPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\CategoryRepository;
use CodeDelivery\Models\Category;
use CodeDelivery\Validators\CategoryValidator;

/**
 * Class CategoryRepositoryEloquent
 * @package namespace App\Repositories;
 */
class CategoryRepositoryEloquent extends BaseRepository implements CategoryRepository
{
    protected $skipPresenter = true;

    protected $fieldSearchable = [
        'name' => 'like'
    ];

    /* public function lists(){
         return $this->model->lists('name','id');
     }*/

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Category::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter()
    {
        return CategoryPresenter::class;
    }
}
