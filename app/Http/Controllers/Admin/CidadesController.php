<?php

namespace CodeDelivery\Http\Controllers\Admin;

use CodeDelivery\Http\Controllers\Admin\Contracts\ICidadesController;
use CodeDelivery\Http\Controllers\BetaGT\SimpleRelationController;
use CodeDelivery\Http\Requests\Admin\CidadeRequest;
use CodeDelivery\Http\Requests\Admin\CidadesRequest;
use CodeDelivery\Repositories\CidadesRepository;
use CodeDelivery\Repositories\EstadoRepository;

class CidadesController extends SimpleRelationController  implements ICidadesController
{
    public function __construct(CidadesRepository $repository, EstadoRepository $relationRepository)
    {
        $this->repository = $repository;

        $this->titulo = 'Cidades';

        $this->route = 'admin.estados.cidades';

        $this->routeRelation = 'admin.estados';

        $this->relationRepository = $relationRepository;
    }

    public function store(CidadeRequest $request, $fk)
    {
        try {
            $relation = $this->relationRepository->find($fk);

            $data = $request->all();

            $data['estado_id'] = $relation->id;

            $entity = $this->repository->create($data);

            return redirect()->route($this->routeRelation . '.show', [ 'id' => $relation->id ])->with('success', "Registro #{$entity->id} cadastrado com sucesso");
        }
        catch (\Exception $ex)
        {
            return redirect()->route($this->routeRelation . '.index')->with('warning', $ex->getMessage());
        }
    }

    public function update(CidadeRequest $request, $fk, $id)
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