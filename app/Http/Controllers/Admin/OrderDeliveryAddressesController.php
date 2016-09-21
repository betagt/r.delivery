<?php

namespace CodeDelivery\Http\Controllers\Admin;

use CodeDelivery\Http\Controllers\Admin\Contracts\IOrderDeliveryAddressesController;
use CodeDelivery\Http\Controllers\BetaGT\SimpleController;
use CodeDelivery\Http\Requests\Admin\OrderDeliveryAddressRequest;
use CodeDelivery\Repositories\OrderDeliveryAddressRepository;

class OrderDeliveryAddressesController extends SimpleController implements IOrderDeliveryAddressesController
{
    public function __construct(OrderDeliveryAddressRepository $repository)
    {
        $this->repository = $repository;

        $this->titulo = 'OrderDeliveryAddresss';

        $this->route = 'admin.orders.delivery_addresses';
    }

    public function store(OrderDeliveryAddressRequest $request)
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

    public function update(OrderDeliveryAddressRequest $request, $id)
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