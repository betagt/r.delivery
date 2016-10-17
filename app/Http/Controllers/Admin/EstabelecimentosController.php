<?php

namespace CodeDelivery\Http\Controllers\Admin;

use CodeDelivery\Http\Controllers\Admin\Contracts\IEstabelecimentosController;
use CodeDelivery\Http\Controllers\BetaGT\SimpleController;
use CodeDelivery\Http\Requests\Admin\EstabelecimentoRequest;
use CodeDelivery\Repositories\CidadeRepository;
use CodeDelivery\Repositories\EstabelecimentoRepository;
use Illuminate\Support\Facades\Input;

class EstabelecimentosController extends SimpleController implements IEstabelecimentosController
{
    /**
     * @var CidadeRepository
     */
    private $cidadeRepository;

    public function __construct(EstabelecimentoRepository $repository, CidadeRepository $cidadeRepository)
    {
        $this->repository = $repository;

        $this->titulo = 'Estabelecimentos do Sistema/Clientes';

        $this->route = 'admin.estabelecimentos';
        $this->cidadeRepository = $cidadeRepository;
    }

    public function create()
    {
        $titulo = $this->titulo;
        $subtitulo = "Novo Registro";

        $list = $this->cidadeRepository->lists('nome', 'id');

        return view($this->route . '.create', compact('titulo', 'subtitulo', 'list'));
    }

    public function edit($id)
    {
        try {
            $entity = $this->repository->find($id);

            $titulo = $this->titulo;

            $subtitulo = "Alterar Registro #{$id}";

            $list = $this->cidadeRepository->lists('nome', 'id');

            return view($this->route . '.edit', compact('entity', 'titulo', 'subtitulo', 'list'));
        } catch (\Exception $ex)
        {
            return redirect()->route($this->route . '.index')->with('warning', "O registro #{$id} não foi localizado: {$ex->getMessage()}" );
        }
    }

    public function store(EstabelecimentoRequest $request)
    {
        try {
            $data = $request->all();

            if ($request->get('icone'))
            {
                $destinationPath = '/images/estabelecimentos';
                $extension = Input::file('icone')->getClientOriginalExtension();
                $fileName = random_int(11111,99999).'.'.$extension;
                Input::file('icone')->move($destinationPath, $fileName);
                $data['icone'] = $fileName;
            }

            $entity = $this->repository->create($data);



            return redirect()->route($this->route . '.show', [ 'id' => $entity->id ])->with('success', "Registro #{$entity->id} cadastrado com sucesso");
        }
        catch (\Exception $ex)
        {
            return redirect()->route($this->route . '.index')->with('warning', $ex->getMessage());
        }
    }

    public function update(EstabelecimentoRequest $request, $id)
    {
        try
        {
            $entity = $this->repository->find($id);

            $data = $request->all();

            if ($request->hasFile('icone')) {
                $extension = $request->file('icone')->getClientOriginalExtension();
                $fileName = random_int(1111,9999) . $extension;
                $request->file('icone')->move(base_path() . '/public/images/estabelecimentos', $fileName);

                $data['icone'] = $fileName;
            }

            $this->repository->update($data, $entity->id);

            return redirect()->route($this->route . '.show', [ 'id' => $entity->id ])->with('success', "O registro {$entity->id} foi atualizado com sucesso");
        }
        catch (\Exception $ex)
        {
            return redirect()->route($this->route . '.index')->with('warning', $ex->getMessage());
        }
    }
}