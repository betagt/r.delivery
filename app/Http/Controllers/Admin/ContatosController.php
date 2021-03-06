<?php

namespace CodeDelivery\Http\Controllers\Admin;

use CodeDelivery\Http\Controllers\Admin\Contracts\IContatosController;
use CodeDelivery\Http\Controllers\BetaGT\SimpleController;
use CodeDelivery\Http\Requests\Admin\ContatoRequest;
use CodeDelivery\Repositories\ContatoRepository;

class ContatosController extends SimpleController implements IContatosController
{
    public function __construct(ContatoRepository $repository)
    {
        $this->repository = $repository;

        $this->titulo = 'Contatos';

        $this->route = 'admin.contatos';
    }

    public function store(ContatoRequest $request)
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

    public function update(ContatoRequest $request, $id)
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