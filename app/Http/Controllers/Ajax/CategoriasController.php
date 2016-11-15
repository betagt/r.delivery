<?php

namespace CodeDelivery\Http\Controllers\Ajax;

use Illuminate\Http\Request;
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

    public function index(Request $request, $estabelecimento)
    {
        return $this->repository->scopeQuery(function ($q) use ($estabelecimento) {
            $q->where(['estabelecimento_id' => $estabelecimento, 'parent_id' => 0, 'status' => 1]);
            return $q->orderBy('id', 'desc');
        })->skipPresenter(false)->paginate(10);
    }

    public function create(CategoryRequest $request)
    {
        $data = $request->all();

        $entity = $this->repository->create($data);

        return Response::json(
            [
                "data" => "Categoria {$entity->name} inserida com sucesso"
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
}