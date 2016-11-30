<?php

namespace CodeDelivery\Http\Controllers\Ajax;

use CodeDelivery\Models\Category;
use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Http\Requests\Admin\CategoryRequest;
use CodeDelivery\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Response;

class CategoriasController extends Controller
{
    /**
     * @var CategoryRepository
     */
    private $repository;

    /**
     * CategoriasController constructor.
     */
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index($estabelecimento)
    {
        return $this->repository->scopeQuery(function ($q) use ($estabelecimento) {
            return $q->where([
                'estabelecimento_id' => $estabelecimento,
                'status' => 1
            ])->orderBy('parent_id', 'asc');
        })->skipPresenter(false)->all();
    }

    public function create(CategoryRequest $request)
    {
        $data = $request->all();

        $entity = $this->repository->create($data);

        return Response::json(
            [
                "data" => "Categoria {$entity->name} inserida com sucesso",
                "id" => $entity->id
            ]
        );
    }

    public function update(CategoryRequest $request, $id)
    {
        $entity = $this->repository->find($id);

        $data = $request->all();

        $this->repository->update($data, $entity->id);

        return Response::json(
            [
                "data" => "Categoria {$entity->name} alterado com sucesso"
            ]
        );
    }

    public function delete($id)
    {
        $entity = Category::find($id);

        $entity->status = 0;

        $entity->save();

        return Response::json(
            [
                "data" => "Categoria {$entity->name} removida com sucesso"
            ]
        );
    }
}