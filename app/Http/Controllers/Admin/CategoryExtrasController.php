<?php

namespace CodeDelivery\Http\Controllers\Admin;

use CodeDelivery\Http\Controllers\Admin\Contracts\ICategoryExtrasController;
use CodeDelivery\Http\Controllers\BetaGT\SimpleRelationController;
use CodeDelivery\Http\Requests\Admin\CategoryExtraRequest;
use CodeDelivery\Repositories\CategoryExtraRepository;
use CodeDelivery\Repositories\CategoryRepository;

class CategoryExtrasController extends SimpleRelationController implements ICategoryExtrasController
{
    public function __construct(CategoryExtraRepository $repository, CategoryRepository $relationRepository)
    {
        $this->repository = $repository;
        $this->relationRepository = $relationRepository;

        $this->titulo = 'Items Adicionais da Categoria';

        $this->route = 'admin.categories.extras';
    }

    public function store(CategoryExtraRequest $request, $fk)
    {
        try {
            $relation = $this->relationRepository->find($fk);

            $data = $request->all();

            $data['category_id'] = $relation->id;

            $entity = $this->repository->create($data);

            return redirect()->route($this->routeRelation . '.show', [ 'id' => $relation->id ])->with('success', "Registro #{$entity->id} cadastrado com sucesso");
        }
        catch (\Exception $ex)
        {
            return redirect()->route($this->routeRelation . '.index')->with('warning', $ex->getMessage());
        }
    }

    public function update(CategoryExtraRequest $request, $fk, $id)
    {
        try
        {
            $relation = $this->relationRepository->find($fk);

            $entity = $this->repository->find($id);

            $data = $request->all();

            $this->repository->update($data, $entity->id);

            return redirect()->route($this->routeRelation . '.show', [ 'id' => $relation->id ])->with('success', "O registro {$entity->id} foi atualizado com sucesso");
        }
        catch (\Exception $ex)
        {
            return redirect()->route($this->routeRelation . '.index')->with('warning', $ex->getMessage());
        }
    }
}