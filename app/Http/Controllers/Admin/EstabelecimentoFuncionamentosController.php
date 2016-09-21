<?php

namespace CodeDelivery\Http\Controllers\Admin;

use CodeDelivery\Http\Controllers\Admin\Contracts\IEstabelecimentoFuncionamentosController;
use CodeDelivery\Http\Controllers\BetaGT\SimpleController;
use CodeDelivery\Http\Requests\Admin\EstabelecimentoFuncionamentoRequest;
use CodeDelivery\Repositories\EstabelecimentoFuncionamentoRepository;

class EstabelecimentoFuncionamentosController extends SimpleController implements IEstabelecimentoFuncionamentosController
{
    public function __construct(EstabelecimentoFuncionamentoRepository $repository)
    {
        $this->repository = $repository;

        $this->titulo = 'EstabelecimentoFuncionamentos';

        $this->route = 'admin.estabelecimentos.funcionamentos';
    }

    public function store(EstabelecimentoFuncionamentoRequest $request)
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

    public function update(EstabelecimentoFuncionamentoRequest $request, $id)
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