<?php
/**
 * Created by PhpStorm.
 * User: allan
 * Date: 15/09/2016
 * Time: 18:15
 */

namespace CodeDelivery\Http\Controllers\Admin;


use CodeDelivery\Http\Controllers\Admin\Contracts\IOrderAvaliacoesController;
use CodeDelivery\Http\Controllers\BetaGT\SimpleController;
use CodeDelivery\Http\Requests\Admin\EstadoRequest;
use CodeDelivery\Repositories\EstadoRepository;

class OrderAvaliacoesController extends SimpleController implements IOrderAvaliacoesController
{
    public function __construct(EstadoRepository $repository)
    {
        $this->repository = $repository;

        $this->titulo = 'OrderAvaliacoes';

        $this->route = 'admin.estados';
    }

    public function store(EstadoRequest $request)
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

    public function update(EstadoRequest $request, $id)
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