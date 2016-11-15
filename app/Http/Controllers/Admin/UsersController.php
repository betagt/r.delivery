<?php

namespace CodeDelivery\Http\Controllers\Admin;

use CodeDelivery\Http\Controllers\Admin\Contracts\IUsersController;
use CodeDelivery\Http\Controllers\BetaGT\SimpleController;
use CodeDelivery\Http\Requests\Admin\UserRequest;
use CodeDelivery\Models\Estabelecimento;
use CodeDelivery\Repositories\CategoryRepository;
use CodeDelivery\Repositories\EstabelecimentoRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserRepository;

class UsersController extends SimpleController implements IUsersController
{
    /**
     * @var EstabelecimentoRepository
     */
    private $estabelecimentoRepository;
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;
    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(UserRepository $repository, EstabelecimentoRepository $estabelecimentoRepository, CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        $this->repository = $repository;

        $this->titulo = 'Usuários do Sistema/Clientes';

        $this->template = 'admin.users';

        $this->route = $this->template;

        if (auth()->user()->role == 'estabelecimento')
            $this->route = 'cliente.users';

        $this->estabelecimentoRepository = $estabelecimentoRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function show($id)
    {
        if (auth()->user()->role == 'estabelecimento') {
            if (auth()->user()->id <> $id) {
                abort(500, 'Você não tem autorização para visualizar essas informações');
            }
            $this->route = 'cliente.users';

            $entity = $this->repository->find($id);

            $estabelecimento = $this->estabelecimentoRepository->findWhere(['user_id' => $id])->first();

            $categorias = $this->categoryRepository->findWhere(['estabelecimento_id' => $estabelecimento->id, 'parent_id' => 0]);

            $titulo = $this->titulo;;

            $subtitulo = "Visualizar Registro #{$entity->id}";

            return view($this->template . '.show', compact('entity', 'estabelecimento', 'categorias', 'titulo', 'subtitulo'));
        }
        return parent::show($id); // TODO: Change the autogenerated stub
    }

    public function store(UserRequest $request)
    {
        try {
            $data = $request->all();

            $entity = $this->repository->create($data);

            return redirect()->route($this->route . '.show', ['id' => $entity->id])->with('success', "Registro #{$entity->id} cadastrado com sucesso");
        } catch (\Exception $ex) {
            return redirect()->route($this->route . '.index')->with('warning', $ex->getMessage());
        }
    }

    public function update(UserRequest $request, $id)
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