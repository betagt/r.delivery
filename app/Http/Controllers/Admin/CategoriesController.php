<?php

namespace CodeDelivery\Http\Controllers\Admin;


use CodeDelivery\Http\Controllers\Admin\Contracts\ICategoryController;
use CodeDelivery\Http\Controllers\BetaGT\SimpleController;
use CodeDelivery\Http\Controllers\BetaGT\SimpleRelationController;
use CodeDelivery\Http\Requests\Admin\CategoryRequest;
use CodeDelivery\Repositories\CategoryRepository;
use CodeDelivery\Repositories\EstabelecimentoRepository;

class CategoriesController extends SimpleRelationController implements ICategoryController
{

    public function __construct(CategoryRepository $repository, EstabelecimentoRepository $relationRepository)
    {
        $this->repository = $repository;
        $this->relationRepository = $relationRepository;

        $this->titulo = "Categorias dos Produtos";
        $this->route = 'admin.estabelecimentos.categories';
    }

    public function index($estabelecimento_id)
    {
        $titulo = $this->titulo;

        $subtitulo = "Listagem/Pesquisa de Registros";

        $relation = $this->relationRepository->find($estabelecimento_id);

        $list = $this->repository->scopeQuery(function($query){
            return $query->orderBy('parent_id','asc');
        })->paginate();

        return view($this->route . '.index', compact('list', 'titulo', 'subtitulo', 'relation'));
    }

    public function create($estabelecimento_id)
    {
        $titulo = $this->titulo;

        $subtitulo = "Novo Registro";

        $relation = $this->relationRepository->find($estabelecimento_id);

        $select = $this->repository->getCategories($estabelecimento_id);

        return view($this->route . '.create', compact('titulo', 'subtitulo', 'select', 'relation'));
    }

    public function edit($estabelecimento_id, $id)
    {
        try {
            $entity = $this->repository->find($id);

            $titulo = $this->titulo;

            $subtitulo = "Alterar Registro #{$id}";

            $select = $this->repository->getCategories($estabelecimento_id);

            return view($this->route . '.edit', compact('entity', 'titulo', 'subtitulo', 'select'));
        } catch (\Exception $ex)
        {
            return redirect()->route($this->route . '.index')->with('warning', "O registro #{$id} não foi localizado: {$ex->getMessage()}" );
        }
    }

    public function store($estabelecimento_id, CategoryRequest $request)
    {
        try {
            $data = $request->all();

            $entity = $this->repository->create($data);

            return redirect()->route($this->route . '.show', [ 'id' => $entity->id ])->with('success', "Registro #{$entity->id} cadastrado com sucesso");
        }
        catch (\Exception $ex)
        {
            return redirect()->route($this->route . '.index')->with('warning', $ex->getMessage());
        }
    }

    public function update($estabelecimento_id, CategoryRequest $request, $id)
    {
        try
        {
            $entity = $this->repository->find($id);

            $data = $request->all();

            $this->repository->update($data, $entity->id);

            return redirect()->route($this->route . '.show', [ 'id' => $entity->id ])->with('success', "O registro {$entity->id} foi atualizado com sucesso");
        }
        catch (\Exception $ex)
        {
            return redirect()->route($this->route . '.index')->with('warning', $ex->getMessage());
        }
    }
}
