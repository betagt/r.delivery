<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests\AdminProductRequest;
use CodeDelivery\Repositories\CategoryRepository;
use CodeDelivery\Repositories\EstabelecimentoRepository;
use CodeDelivery\Repositories\ProductRepository;
use Illuminate\Http\Request;

use CodeDelivery\Http\Controllers\Controller;

class ProductsController extends Controller
{

    private $repository;
    private $categoryRepository;
    /**
     * @var EstabelecimentoRepository
     */
    private $estabelecimentoRepository;

    public function __construct(ProductRepository $repository,
                                CategoryRepository $categoryRepository,
                                EstabelecimentoRepository $estabelecimentoRepository)
    {
        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;
        $this->estabelecimentoRepository = $estabelecimentoRepository;
    }

    public function create($estabelecimentoId){
        try
        {
            $relation = $this->estabelecimentoRepository->find($estabelecimentoId);

            $titulo = "Produto do Estabelecimento #{$estabelecimentoId}";

            $subtitulo = "Novo Registro";

            $select = $this->categoryRepository->lists('name','id');

            return view('admin.products.create',compact('select', 'relation', 'titulo', 'subtitulo'));
        } catch (\Exception $ex)
        {
            return redirect()->route('admin.estabelecimentos.index')->with('warning', "O registro #{$estabelecimentoId} não foi localizado: {$ex->getMessage()}" );
        }

    }

    public function edit($estabelecimentoId, $id){
        try {
            $relation = $this->estabelecimentoRepository->find($estabelecimentoId);

            $entity = $this->repository->find($id);

            $titulo = "Produto do Estabelecimento #{$estabelecimentoId}";

            $subtitulo = "Editar Registro #{$entity->id}";

            $select = $this->categoryRepository->lists('name','id');

            return view('admin.products.edit',compact('entity', 'relation', 'select', 'titulo', 'subtitulo'));

        } catch (\Exception $ex)
        {
            return redirect()->route('admin.estabelecimentos.index')->with('warning', "O registro #{$id} não foi localizado: {$ex->getMessage()}" );
        }
    }

    public function show($estabelecimentoId, $id)
    {
        try {
            $relation = $this->estabelecimentoRepository->find($estabelecimentoId);

            $entity = $this->repository->find($id);

            $titulo = "Produto do Estabelecimento #{$estabelecimentoId}";

            $subtitulo = "Visualizar Registro #{$entity->id}";

            return view('admin.products.show', compact('entity', 'relation', 'titulo', 'subtitulo'));
        } catch (\Exception $ex)
        {
            return redirect()->route('admin.estabelecimentos.show', [ 'id' => $estabelecimentoId ])->with('warning', "O registro #{$id} não foi localizado: {$ex->getMessage()}" );
        }
    }

    public function printReport($estabelecimentoId, $id)
    {
        try {
            $relation = $this->estabelecimentoRepository->find($estabelecimentoId);

            $entity = $this->repository->find($id);

            $titulo = "Produto do Estabelecimento #{$estabelecimentoId}";

            $subtitulo = "Visualizar Registro #{$entity->id}";

            return view('admin.products.print', compact('entity', 'relation', 'titulo', 'subtitulo'));
        } catch (\Exception $ex)
        {
            return redirect()->route('admin.estabelecimentos.show', [ 'id' => $estabelecimentoId ])->with('warning', "O registro #{$id} não foi localizado: {$ex->getMessage()}" );
        }
    }

    public function store($estabelecimentoId, AdminProductRequest $request){
        try {
            $relation = $this->estabelecimentoRepository->find($estabelecimentoId);
            
            $data = $request->all();

            $data['estabelecimento_id'] = $estabelecimentoId;

            $entity = $this->repository->create($data);

            return redirect()->route('admin.estabelecimentos.show', [ 'id' => $relation->id ])->with('success', "O registro #{$entity->id} cadastrado com sucesso");;
        } catch (\Exception $ex)
        {
            return redirect()->route('admin.estabelecimentos.show', [ 'id' => $estabelecimentoId ])->with('warning', "Não foi possível salvar o registro: {$ex->getMessage()}" );
        }
    }

    public function update($estabelecimentoId, AdminProductRequest $request, $id){
        try {
            $relation = $this->estabelecimentoRepository->find($estabelecimentoId);
            
            $entity = $this->repository->find($id);

            $data = $request->all();

            $data['estabelecimento_id'] = $estabelecimentoId;

            $this->repository->update($data,$id);

            return redirect()->route('admin.estabelecimentos.show', [ 'id' => $relation->id ])->with('success', "O registro #{$entity->id} cadastrado com sucesso");;
        } catch (\Exception $ex)
        {
            return redirect()->route('admin.estabelecimentos.show', [ 'id' => $estabelecimentoId ])->with('warning', "O registro #{$id} não foi localizado: {$ex->getMessage()}" );
        }
    }

    public function destroy($estabelecimentoId, $id){
        try
        {
            $relation = $this->estabelecimentoRepository->find($estabelecimentoId);

            $entity = $this->repository->find($id);

            $this->repository->delete($id);
            
            return redirect()->route('admin.estabelecimentos.show', [ 'id' => $relation->id ])->with('success', "O registro #{$entity->id} foi atualizado com sucesso");
        } catch (\Exception $ex)
        {
            return redirect()->route('admin.estabelecimentos.show', [ 'id' => $estabelecimentoId ])->with('warning', "O registro #{$id} não foi localizado: {$ex->getMessage()}" );
        }
    }

    public function destroySelected($estabelecimentoId, Request $request)
    {
        $ids = $request->all();

        if (empty($ids['id']))
        {
            return redirect()->route('admin.estabelecimentos.show', [ 'id' => $estabelecimentoId ])->with('warning', "Nenhhum registro foi selecionado");
        }

        foreach ($ids['id'] as $id) {
            $this->repository->delete($id);
        }

        return redirect()->route('admin.estabelecimentos.show', [ 'id' => $estabelecimentoId ])->with('success', "Os registros foram excluídos com sucesso");
    }
}
