<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use Illuminate\Http\Request;

use CodeDelivery\Http\Requests\AdminOrderRequest;
use CodeDelivery\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{

    private $repository;
    /**
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var OrderService
     */
    private $service;

    public function __construct(
        OrderRepository $repository,
        ProductRepository $productRepository,
        UserRepository $userRepository,
        OrderService $service
    )
    {
        $this->repository = $repository;
        $this->productRepository = $productRepository;
        $this->userRepository = $userRepository;
        $this->service = $service;
    }

    public function index()
    {
        $titulo = "Pedidos";

        $subtitulo = "Listagem/Pesquisa de Registros";

        $list = $this->repository->paginate();

        return view('admin.orders.index', compact('list', 'titulo', 'subtitulo'));
    }

    public function show($id)
    {
        try {
            $entity = $this->repository->find($id);

            $deliveryman = $this->userRepository->getDeliveryman();

            $titulo = "Pedidos";

            $subtitulo = "Visualizar Registro #{$entity->id}";

            return view('admin.orders.show', compact('entity', 'titulo', 'subtitulo', 'deliveryman'));
        } catch (\Exception $ex)
        {
            return redirect()->route('admin.orders.index')->with('warning', "O registro #{$id} não foi localizado: {$ex->getMessage()}" );
        }
    }

    public function printReport($id)
    {
        try {
            $entity = $this->repository->find($id);

            $deliveryman = $this->userRepository->getDeliveryman();

            $titulo = "Pedidos";

            $subtitulo = "Visualizar Registro #{$entity->id}";

            return view('admin.orders.print', compact('entity', 'titulo', 'subtitulo', 'deliveryman'));
        } catch (\Exception $ex)
        {
            return redirect()->route('admin.orders.index')->with('warning', "O registro #{$id} não foi localizado: {$ex->getMessage()}" );
        }
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

            return view('admin.orders.edit', compact('entity', 'titulo', 'subtitulo', 'list_status', 'deliveryman'));
        } catch (\Exception $ex)
        {
            return redirect()->route('admin.orders.index')->with('warning', "O registro #{$id} não foi localizado: {$ex->getMessage()}" );
        }
    }

    public function update(Request $request, $id)
    {
        try
        {
            $entity = $this->repository->find($id);

            $data = $request->all();

            $this->repository->update($data,$id);

            return redirect()->route('admin.orders.show', [ 'id' => $entity->id ])->with('success', "O registro {$entity->id} foi atualizado com sucesso");
        }
        catch (\Exception $ex)
        {
            return redirect()->route('admin.orders.index')->with('warning', "Não foi possível salvar o registro: {$ex->getMessage()}");
        }
    }

    public function destroy($id)
    {
        try {
            $entity = $this->repository->find($id);

            $this->repository->delete($id);

            return redirect()->route('admin.orders.index')->with('success', "A Registro #{$entity->id} foi excluído com sucesso");
        } catch (\Exception $ex)
        {
            return redirect()->route('admin.orders.index')->with('warning', "Problemas com o registro #{$id} {$ex->getMessage()}");
        }
    }

    public function destroySelected(Request $request)
    {
        $ids = $request->all();

        if (empty($ids['id']))
        {
            return redirect()->route('admin.orders.index')->with('warning', "Nenhhum registro foi selecionado");
        }

        foreach ($ids['id'] as $id) {
            $this->repository->delete($id);
        }

        return redirect()->route('admin.orders.index')->with('success', "Os registros foram excluídos com sucesso");
    }
}
