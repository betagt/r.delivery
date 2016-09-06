<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests\AdminClientRequest;
use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Services\ClientService;
use Illuminate\Http\Request;
use CodeDelivery\Http\Controllers\Controller;

class ClientsController extends Controller
{

    private $repository;
    /**
     * @var ClientService
     */
    private $clientService;

    public function __construct(ClientRepository $repository, ClientService $clientService)
    {
        $this->repository = $repository;
        $this->clientService = $clientService;
    }

    public function index(){
        $titulo = "Clientes";

        $subtitulo = "Listagem/Pesquisa de Registros";

        $list = $this->repository->paginate();

        return view('admin.clients.index', compact('list', 'titulo', 'subtitulo'));
    }

    public function create(){
        $titulo = "Clientes";

        $subtitulo = "Novo Registro";
        
        return view('admin.clients.create', compact('titulo', 'subtitulo'));
    }

    public function show($id)
    {
        try {
            $entity = $this->repository->find($id);

            $titulo = "Clientes";

            $subtitulo = "Visualizar Registro #{$entity->id}";

            return view('admin.clients.show', compact('entity', 'titulo', 'subtitulo'));
        } catch (\Exception $ex)
        {
            return redirect()->route('admin.clients.index')->with('warning', "O registro #{$id} não foi localizado: {$ex->getMessage()}" );
        }
    }

    public function printReport($id)
    {
        try {
            $entity = $this->repository->find($id);

            $titulo = "Dados do Cliente";

            $subtitulo = "Visualizar Registro #{$entity->id}";

            return view('admin.clients.print', compact('entity', 'titulo', 'subtitulo'));
        } catch (\Exception $ex)
        {
            return redirect()->route('admin.clients.index')->with('warning', "O registro #{$id} não foi localizado: {$ex->getMessage()}" );
        }
    }

    public function edit($id){
        try {
            $entity = $this->repository->find($id);

            $titulo = "Dados do Cliente";

            $subtitulo = "Editar Registro #{$entity->id}";

            return view('admin.clients.edit', compact('entity', 'titulo', 'subtitulo'));
        } catch (\Exception $ex)
        {
            return redirect()->route('admin.clients.index')->with('warning', "O registro #{$id} não foi localizado: {$ex->getMessage()}" );
        }
    }

    public function store(AdminClientRequest $request){
        try
        {
            $data = $request->all();
            $entity = $this->clientService->create($data);
            return redirect()->route('admin.clients.show', ['id' => $entity->id])->with('success', "Registro #{$entity->id} cadastrado com sucesso");
        }
        catch (\Exception $ex)
        {
            return redirect()->route('admin.clients.index')->with('warning', "Não foi possível salvar o registro: {$ex->getMessage()}");
        }
    }

    public function update(AdminClientRequest $request, $id){
        try
        {
            $entity = $this->repository->find($id);

            $data = $request->all();

            $this->clientService->update($data,$id);

            return redirect()->route('admin.clients.show', [ 'id' => $entity->id ])->with('success', "O registro {$entity->id} foi atualizado com sucesso");
        }
        catch (\Exception $ex)
        {
            return redirect()->route('admin.clients.index')->with('warning', "Não foi possível salvar o registro: {$ex->getMessage()}");
        }
    }
}
