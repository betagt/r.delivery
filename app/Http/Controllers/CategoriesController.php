<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\CategoryRepository;
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests\AdminCategoryRequest;
use CodeDelivery\Http\Controllers\Controller;

class CategoriesController extends Controller
{

    private $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $titulo = "Categorias dos Produtos";

        $subtitulo = "Listagem/Pesquisa de Registros";

        $list = $this->repository->paginate();

        return view('admin.categories.index', compact('list', 'titulo', 'subtitulo'));
    }

    public function create()
    {
        $titulo = "Categorias dos Produtos";

        $subtitulo = "Novo Registro";

        return view('admin.categories.create', compact('titulo', 'subtitulo'));
    }

    public function show($id)
    {
        try {
            $entity = $this->repository->find($id);

            $titulo = "Categorias dos Produtos";

            $subtitulo = "Visualizar Registro #{$entity->name}";

            return view('admin.categories.show', compact('entity', 'titulo', 'subtitulo'));
        } catch (\Exception $ex)
        {
            return redirect()->route('admin.categories.index')->with('warning', "O registro #{$id} não foi localizado: {$ex->getMessage()}" );
        }
    }

    public function edit($id)
    {
        try {
            $entity = $this->repository->find($id);

            $titulo = "Categorias dos Produtos";

            $subtitulo = "Alterar Registro #{$id}";

            return view('admin.categories.edit', compact('entity', 'titulo', 'subtitulo'));
        } catch (\Exception $ex)
        {
            return redirect()->route('admin.categories.index')->with('warning', "O registro #{$id} não foi localizado: {$ex->getMessage()}" );
        }
    }

    public function store(AdminCategoryRequest $request)
    {
        try {
            $data = $request->all();

            $entity = $this->repository->create($data);

            return redirect()->route('admin.categories.show', [ 'id' => $entity->id ])->with('success', "Registro #{$entity->id} cadastrado com sucesso");
        }
        catch (\Exception $ex)
        {
            return redirect()->route('admin.categories.index')->with('warning', "Não foi possível salvar o registro: {$ex->getMessage()}");
        }
    }

    public function update(AdminCategoryRequest $request, $id)
    {
        try
        {
            $entity = $this->repository->find($id);

            $data = $request->all();

            $this->repository->update($data, $entity->id);

            return redirect()->route('admin.categories.show', [ 'id' => $entity->id ])->with('success', "O registro {$entity->id} foi atualizado com sucesso");
        }
        catch (\Exception $ex)
        {
            return redirect()->route('admin.categories.index')->with('warning', "Não foi possível salvar o registro: {$ex->getMessage()}");
        }
    }

    public function destroy($id)
    {
        try {
            $entity = $this->repository->find($id);

            $this->repository->delete($id);

            return redirect()->route('admin.categories.index')->with('success', "A Registro #{$entity->id} foi excluído com sucesso");
        } catch (\Exception $ex)
        {
            return redirect()->route('admin.categories.index')->with('warning', "Problemas com o registro #{$id} {$ex->getMessage()}");
        }
    }

    public function destroySelected(Request $request)
    {
        $ids = $request->all();

        if (empty($ids['id']))
        {
            return redirect()->route('admin.categories.index')->with('warning', "Nenhhum registro foi selecionado");
        }

        foreach ($ids['id'] as $id) {
            $this->repository->delete($id);
        }

        return redirect()->route('admin.categories.index')->with('success', "Os registros foram excluídos com sucesso");
    }
}
