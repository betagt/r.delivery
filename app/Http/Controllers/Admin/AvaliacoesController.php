<?php

namespace CodeDelivery\Http\Controllers\Admin;

use CodeDelivery\Http\Controllers\BetaGT\SimpleController;
use CodeDelivery\Http\Controllers\Admin\Contracts\IAvaliacoesController;
use CodeDelivery\Repositories\AvaliacaoRepository;
use CodeDelivery\Http\Requests\Admin\AvaliacaoRequest;

class AvaliacoesController extends SimpleController implements IAvaliacoesController
{
    public function __construct(AvaliacaoRepository $repository)
    {
        $this->repository = $repository;

        $this->titulo = "Questões para Avaliação";

        $this->route = 'admin.avaliacoes';
    }

    public function store(AvaliacaoRequest $request)
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

    public function update(AvaliacaoRequest $request, $id)
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
