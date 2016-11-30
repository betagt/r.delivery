<?php

namespace CodeDelivery\Http\Controllers\Angular;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Http\Requests\Admin\ProductRequest;
use CodeDelivery\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ProdutoController extends Controller
{
    /**
     * @var ProdutoRepository
     */
    private $repository;

    /**
     * PaginaController constructor.
     */
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index($categoryId)
    {
        return $this->repository->scopeQuery(function ($q) use ($categoryId) {
            return $q->where([
                'category_id' => $categoryId
            ])->orderBy('id', 'desc');
        })->skipPresenter(false)->all();
    }

    public function remove($id)
    {
        $entity = $this->repository->find($id);

        $entity->status = 0;

        $entity->save();

        return Response::json(
            [
                "data" => "Registro #{$entity->id} removida com sucesso."
            ]
        );
    }

    public function update(ProductRequest $request, $id)
    {
        $entity = $this->repository->find($id);

        $data = $request->all();

        $this->repository->update($data, $entity->id);

        return Response::json(
            [
                "data" => "Registro {$entity->titulo} alterado com sucesso",
                "id" => $entity->id
            ]
        );
    }

    public function create(ProductRequest $request)
    {
        $data = $request->all();

        $entity = $this->repository->create($data);

        return Response::json(
            [
                "data" => "Registro {$entity->titulo} inserida com sucesso",
                "id" => $entity->id
            ]
        );
    }

    public function removeSelected(Request $request)
    {
        $data = $request->all();

        $count = count($data);

        if ($count == 0) {
            return Response::json(
                [
                    "data" => "Nenhum registro foi selecionado."
                ]
            );
        }

        foreach ($data as $item) {
            $entity = $this->repository->find($item);

            $entity->status = 0;

            $entity->save();
        }

        return Response::json(
            [
                "data" => "Os registros foram excluídos com sucesso."
            ]
        );
    }
}
