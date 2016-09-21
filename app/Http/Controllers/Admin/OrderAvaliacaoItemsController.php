<?php
/**
 * Created by PhpStorm.
 * User: allan
 * Date: 15/09/2016
 * Time: 18:15
 */

namespace CodeDelivery\Http\Controllers\Admin;


use CodeDelivery\Http\Controllers\Admin\Contracts\IOrderAvaliacaoItemsController;
use CodeDelivery\Http\Controllers\BetaGT\SimpleController;
use CodeDelivery\Http\Requests\Admin\OrderAvaliacaoItemRequest;
use CodeDelivery\Repositories\OrderAvaliacaoItemRepository;

class OrderAvaliacaoItemsController extends SimpleController implements IOrderAvaliacaoItemsController
{
    public function __construct(OrderAvaliacaoItemRepository $repository)
    {
        $this->repository = $repository;

        $this->titulo = 'OrderAvaliacaoItems';

        $this->route = 'admin.orders.avaliacoes.items';
    }

    public function store(OrderAvaliacaoItemRequest $request)
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

    public function update(OrderAvaliacaoItemRequest $request, $id)
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