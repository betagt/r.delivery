<?php

namespace CodeDelivery\Http\Controllers\Admin;


use CodeDelivery\Http\Controllers\Admin\Contracts\ICategoryController;
use CodeDelivery\Http\Controllers\BetaGT\SimpleController;
use CodeDelivery\Http\Requests\Admin\CategoryRequest;
use CodeDelivery\Repositories\CategoryRepository;

class CategoriesController extends SimpleController implements ICategoryController
{

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;

        $this->titulo = "Categorias dos Produtos";

        $this->route = 'admin.categories';
    }

    public function index()
    {
        $titulo = $this->titulo;

        $subtitulo = "Listagem/Pesquisa de Registros";

        $list = $this->repository->scopeQuery(function($query){
            return $query->orderBy('parent_id','asc');
        })->paginate();

        return view($this->route . '.index', compact('list', 'titulo', 'subtitulo'));
    }

    public function create()
    {
        $titulo = $this->titulo;

        $subtitulo = "Novo Registro";

        $select = $this->repository->getCategories();

        return view($this->route . '.create', compact('titulo', 'subtitulo', 'select'));
    }

    public function edit($id)
    {
        try {
            $entity = $this->repository->find($id);

            $titulo = $this->titulo;

            $subtitulo = "Alterar Registro #{$id}";

            $select = $this->repository->getCategories();

            return view($this->route . '.edit', compact('entity', 'titulo', 'subtitulo', 'select'));
        } catch (\Exception $ex)
        {
            return redirect()->route($this->route . '.index')->with('warning', "O registro #{$id} não foi localizado: {$ex->getMessage()}" );
        }
    }

    public function store(CategoryRequest $request)
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

    public function update(CategoryRequest $request, $id)
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
