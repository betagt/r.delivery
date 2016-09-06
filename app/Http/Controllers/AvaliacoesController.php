<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\AvaliacaoRepository;
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests\AdminAvaliacaoRequest;
use CodeDelivery\Http\Controllers\Controller;

class AvaliacoesController extends Controller
{

    private $repository;

    public function __construct(AvaliacaoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $titulo = "Questões para avaliação dos pedidos";

        $subtitulo = "Listagem/Pesquisa de Registros";

        $list = $this->repository->paginate();

        return view('admin.avaliacoes.index', compact('list', 'titulo', 'subtitulo'));
    }

    public function create()
    {
        $titulo = "Questões para avaliação dos pedidos";

        $subtitulo = "Novo Registro";

        return view('admin.avaliacoes.create', compact('titulo', 'subtitulo'));
    }

    public function show($id)
    {
        try {
            $entity = $this->repository->find($id);

            $titulo = "Questões para avaliação dos pedidos";

            $subtitulo = "Visualizar Registro #{$entity->name}";

            return view('admin.avaliacoes.show', compact('entity', 'titulo', 'subtitulo'));
        } catch (\Exception $ex)
        {
            return redirect()->route('admin.avaliacoes.index')->with('warning', "O registro #{$id} não foi localizado: {$ex->getMessage()}" );
        }
    }

    public function edit($id)
    {
        try {
            $entity = $this->repository->find($id);

            $titulo = "Questões para avaliação dos pedidos";

            $subtitulo = "Alterar Registro #{$id}";

            return view('admin.avaliacoes.edit', compact('entity', 'titulo', 'subtitulo'));
        } catch (\Exception $ex)
        {
            return redirect()->route('admin.avaliacoes.index')->with('warning', "O registro #{$id} não foi localizado: {$ex->getMessage()}" );
        }
    }

    public function store(AdminAvaliacaoRequest $request)
    {
        try {
            $data = $request->all();

            $entity = $this->repository->create($data);

            return redirect()->route('admin.avaliacoes.show', [ 'id' => $entity->id ])->with('success', "Registro #{$entity->id} cadastrado com sucesso");
        }
        catch (\Exception $ex)
        {
            return redirect()->route('admin.avaliacoes.index')->with('warning', "Não foi possível salvar o registro: {$ex->getMessage()}");
        }
    }

    public function update(AdminAvaliacaoRequest $request, $id)
    {
        try
        {
            $entity = $this->repository->find($id);

            $data = $request->all();

            $this->repository->update($data, $entity->id);

            return redirect()->route('admin.avaliacoes.show', [ 'id' => $entity->id ])->with('success', "O registro {$entity->id} foi atualizado com sucesso");
        }
        catch (\Exception $ex)
        {
            return redirect()->route('admin.avaliacoes.index')->with('warning', "Não foi possível salvar o registro: {$ex->getMessage()}");
        }
    }

    public function destroy($id)
    {
        try {
            $entity = $this->repository->find($id);

            $this->repository->delete($id);

            return redirect()->route('admin.avaliacoes.index')->with('success', "A Registro #{$entity->id} foi excluído com sucesso");
        } catch (\Exception $ex)
        {
            return redirect()->route('admin.avaliacoes.index')->with('warning', "Problemas com o registro #{$id} {$ex->getMessage()}");
        }
    }

    public function destroySelected(Request $request)
    {
        $ids = $request->all();

        if (empty($ids['id']))
        {
            return redirect()->route('admin.avaliacoes.index')->with('warning', "Nenhhum registro foi selecionado");
        }

        foreach ($ids['id'] as $id) {
            $this->repository->delete($id);
        }

        return redirect()->route('admin.avaliacoes.index')->with('success', "Os registros foram excluídos com sucesso");
    }
}
