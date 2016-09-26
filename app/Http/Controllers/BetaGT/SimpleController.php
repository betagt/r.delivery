<?php

namespace CodeDelivery\Http\Controllers\BetaGT;

use CodeDelivery\Http\Controllers\BetaGT\Contracts\ISimpleController;
use CodeDelivery\Http\Requests\Request;
use Illuminate\Routing\Controller;

class SimpleController extends Controller  implements ISimpleController
{
    protected $repository, $route, $titulo;

    public function index()
    {
        $titulo = $this->titulo;

        $subtitulo = "Listagem/Pesquisa de Registros";

        $list = $this->repository->scopeQuery(function($query){
            return $query->orderBy('id','desc');
        })->paginate();

        return view($this->route . '.index', compact('list', 'titulo', 'subtitulo'));
    }

    public function create()
    {
        $titulo = $this->titulo;
        $subtitulo = "Novo Registro";

        return view($this->route . '.create', compact('titulo', 'subtitulo'));
    }

    public function edit($id)
    {
        try {
            $entity = $this->repository->find($id);

            $titulo = $this->titulo;

            $subtitulo = "Alterar Registro #{$id}";

            return view($this->route . '.edit', compact('entity', 'titulo', 'subtitulo'));
        } catch (\Exception $ex)
        {
            return redirect()->route($this->route . '.index')->with('warning', "O registro #{$id} não foi localizado: {$ex->getMessage()}" );
        }
    }

    public function show($id)
    {
        try {
            $entity = $this->repository->find($id);

            $titulo = $this->titulo;;

            $subtitulo = "Visualizar Registro #{$entity->id}";

            return view($this->route . '.show', compact('entity', 'titulo', 'subtitulo'));
        } catch (\Exception $ex)
        {
            return redirect()->route($this->route . '.index')->with('warning', "O registro #{$id} não foi localizado: {$ex->getMessage()}" );
        }
    }

    public function printReport($id)
    {
        try {
            $entity = $this->repository->find($id);

            $titulo = $this->titulo;

            $subtitulo = "Visualizar Registro # {$entity->id}";

            return view($this->route . '.print', compact('entity', 'titulo', 'subtitulo'));
        } catch (\Exception $ex)
        {
            return redirect()->route($this->route . '.index')->with('warning', $ex->getMessage() );
        }
    }

    public function destroy($id)
    {
        try {
            $entity = $this->repository->find($id);

            $this->repository->delete($id);

            return redirect()->route($this->route . '.index')->with('success', "A Registro #{$entity->id} foi excluído com sucesso");
        } catch (\Exception $ex)
        {
            return redirect()->route($this->route . '.index')->with('warning', "Problemas com o registro #{$id} {$ex->getMessage()}");
        }
    }

    public function destroySelected(Request $request)
    {
        $ids = $request->all();

        if (empty($ids['id']))
        {
            return redirect()->route($this->route . '.index')->with('warning', "Nenhhum registro foi selecionado");
        }

        foreach ($ids['id'] as $id) {
            $this->repository->delete($id);
        }

        return redirect()->route($this->route . '.index')->with('success', "Os registros foram excluídos com sucesso");
    }
}