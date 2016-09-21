<?php

namespace CodeDelivery\Http\Controllers\Admin;

use CodeDelivery\Http\Controllers\Admin\Contracts\IEstabelecimentoCozinhasController;
use CodeDelivery\Http\Controllers\BetaGT\SimpleController;
use CodeDelivery\Http\Requests\Admin\EstabelecimentoCozinhaRequest;
use CodeDelivery\Repositories\EstabelecimentoCozinhaRepository;

class EstabelecimentoCozinhasController extends SimpleController implements IEstabelecimentoCozinhasController
{
    public function __construct(EstabelecimentoCozinhaRepository $repository)
    {
        $this->repository = $repository;

        $this->titulo = 'EstabelecimentoCozinhas';

        $this->route = 'admin.estabelecimentos.cozinhas';
    }

    public function store(EstabelecimentoCozinhaRequest $request)
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

    public function update(EstabelecimentoCozinhaRequest $request, $id)
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