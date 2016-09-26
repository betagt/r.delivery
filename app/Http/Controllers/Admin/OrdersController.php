<?php

namespace CodeDelivery\Http\Controllers\Admin;

use CodeDelivery\Http\Controllers\Admin\Contracts\IOrdersController;
use CodeDelivery\Http\Controllers\BetaGT\SimpleController;
use CodeDelivery\Http\Requests\Admin\OrderRequest;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;

class OrdersController extends SimpleController implements IOrdersController
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(OrderRepository $repository, UserRepository $userRepository)
    {
        $this->repository = $repository;

        $this->titulo = 'Orders';

        $this->route = 'admin.orders';
        $this->userRepository = $userRepository;
    }

    public function create()
    {
        $list_status = [
            0 => "Pendente",
            1 => "A Caminho",
            2 => "Entregue",
            3 => "Cancelado",
        ];

        $deliveryman = $this->userRepository->getDeliveryman();

        $titulo = $this->titulo;

        $subtitulo = "Novo Registro";

        return view($this->route . '.create', compact('titulo', 'subtitulo', 'list_status', 'deliveryman'));
    }

    public function edit($id)
    {
        try {
            $entity = $this->repository->find($id);

            $titulo = "Pedidos";

            $subtitulo = "Editar Registro #{$entity->id}";

            $list_status = [
                0 => "Pendente",
                1 => "A Caminho",
                2 => "Entregue",
                3 => "Cancelado",
            ];

            $deliveryman = $this->userRepository->getDeliveryman();

            return view($this->route . '.edit', compact('entity', 'titulo', 'subtitulo', 'list_status', 'deliveryman'));
        } catch (\Exception $ex)
        {
            return redirect()->route('admin.orders.index')->with('warning', "O registro #{$id} não foi localizado: {$ex->getMessage()}" );
        }
    }

    public function store(OrderRequest $request)
    {
        try {
            $data = $request->all();

            $entity = $this->repository->create($data);

            return redirect()->route($this->route . '.show', ['id' => $entity->id])->with('success', "Registro #{$entity->id} cadastrado com sucesso");
        } catch (\Exception $ex) {
            return redirect()->route($this->route . '.index')->with('warning', $ex->getMessage());
        }
    }

    public function update(OrderRequest $request, $id)
    {
        try {
            $entity = $this->repository->find($id);

            $data = $request->all();

            $this->repository->update($data, $entity->id);

            return redirect()->route($this->route . '.show', ['id' => $entity->id])->with('success', "O registro {$entity->id} foi atualizado com sucesso");
        } catch (\Exception $ex) {
            return redirect()->route($this->route . '.index')->with('warning', $ex->getMessage());
        }
    }
}