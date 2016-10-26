<?php

namespace CodeDelivery\Http\Controllers\BetaGT;

use CodeDelivery\Http\Controllers\BetaGT\Contracts\ISimpleRelationController;
use CodeDelivery\Http\Requests\Request;
use Illuminate\Routing\Controller;

class SimpleRelationController extends Controller  implements ISimpleRelationController
{
    protected $repository, $relationRepository, $route, $routeRelation, $titulo;

    public function index($fk)
    {
        $titulo = $this->titulo;

        $subtitulo = "Listagem/Pesquisa de Registros";

        $relation = $this->relationRepository->find($fk);

        $list = $this->repository->paginate();

        return view($this->route . '.index', compact('list', 'titulo', 'subtitulo', 'relation'));
    }

    public function create($fk)
    {
        try
        {
            $relation = $this->relationRepository->find($fk);

            $titulo = $this->titulo;

            $subtitulo = "Novo Registro";

            return view($this->route . '.create', compact('titulo', 'subtitulo', 'relation'));

        } catch (\Exception $ex)
        {
            return redirect()->route($this->route . '.index')->with('warning', $ex->getMessage());
        }

    }

    public function edit($fk, $id)
    {
        try {
            $relation = $this->relationRepository->find($fk);

            $entity = $this->repository->find($id);

            $titulo = $this->titulo;

            $subtitulo = "Alterar Registro #{$id}";

            return view($this->route . '.edit', compact('entity', 'titulo', 'subtitulo', 'relation'));
        } catch (\Exception $ex)
        {
            return redirect()->route($this->route . '.index')->with('warning', $ex->getMessage());
        }
    }

    public function show($fk, $id)
    {
        try {
            $relation = $this->relationRepository->find($fk);

            $entity = $this->repository->find($id);

            $titulo = $this->titulo;;

            $subtitulo = "Visualizar Registro #{$entity->id}";

            return view($this->route . '.show', compact('entity', 'titulo', 'subtitulo', 'relation'));
        } catch (\Exception $ex)
        {
            return redirect()->route($this->route . '.index')->with('warning', $ex->getMessage());
        }
    }

    public function printReport($fk, $id)
    {
        try {
            $relation = $this->relationRepository->find($fk);

            $entity = $this->repository->find($id);

            $titulo = $this->titulo;

            $subtitulo = "Visualizar Registro # {$entity->id}";

            return view($this->route . '.print', compact('entity', 'titulo', 'subtitulo', 'relation'));
        } catch (\Exception $ex)
        {
            return redirect()->route($this->route . '.index')->with('warning', $ex->getMessage() );
        }
    }

    public function destroy($fk, $id)
    {
        try {
            $this->relationRepository->find($fk);

            $entity = $this->repository->find($id);

            $this->repository->delete($id);

            return redirect()->route($this->route . '.index')->with('success', "A Registro #{$entity->id} foi excluído com sucesso");
        } catch (\Exception $ex)
        {
            return redirect()->route($this->route . '.index')->with('warning', $ex->getMessage());
        }
    }

    public function destroySelected(Request $request, $fk)
    {
        $ids = $request->all();

        if (empty($ids['id']))
        {
            return redirect()->route($this->route . '.index')->with('warning', "Nenhhum registro foi selecionado");
        }

        foreach ($ids['id'] as $id) {
            $this->repository->delete($id);
        }

        return redirect()->route($this->route . '.index')->with('success', "Os registros foram excluídos com sucesso");    }
}