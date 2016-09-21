<?php

namespace CodeDelivery\Http\Controllers\Admin;

use CodeDelivery\Http\Controllers\Admin\Contracts\IPorcaoCategoryProductsController;
use CodeDelivery\Http\Controllers\BetaGT\SimpleController;
use CodeDelivery\Http\Requests\Admin\PorcaoCategoryProductRequest;
use CodeDelivery\Repositories\PorcaoCategoryProductRepository;

class PorcaoCategoryProductsController extends SimpleController implements IPorcaoCategoryProductsController
{
    public function __construct(PorcaoCategoryProductRepository $repository)
    {
        $this->repository = $repository;

        $this->titulo = 'PorcaoCategoryProducts';

        $this->route = 'admin.porcao_category.products';
    }

    public function store(PorcaoCategoryProductRequest $request)
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

    public function update(PorcaoCategoryProductRequest $request, $id)
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