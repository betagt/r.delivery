<?php

namespace CodeDelivery\Http\Controllers\Admin;

use CodeDelivery\Http\Controllers\Admin\Contracts\IEstabelecimentoEntregasController;
use CodeDelivery\Http\Controllers\BetaGT\SimpleController;
use CodeDelivery\Http\Requests\Admin\EstabelecimentoEntregaRequest;
use CodeDelivery\Repositories\EstabelecimentoEntregaRepository;

class EstabelecimentoEntregasController extends SimpleController implements IEstabelecimentoEntregasController
{
    public function __construct(EstabelecimentoEntregaRepository $repository)
    {
        $this->repository = $repository;

        $this->titulo = 'EstabelecimentoEntregas';

        $this->route = ' admin.estabelecimentos.entregas';
    }

    public function store(EstabelecimentoEntregaRequest $request)
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

    public function update(EstabelecimentoEntregaRequest $request, $id)
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