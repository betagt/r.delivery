<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests\AdminEstabelecimentoRequest;
use CodeDelivery\Repositories\EstabelecimentoRepository;
use CodeDelivery\Services\EstabelecimentoService;
use Intervention\Image\Facades\Image;

class EstabelecimentosController extends Controller
{

    private $repository;
    
    public function __construct(EstabelecimentoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(){
        $titulo = "Estabelecimentos";

        $subtitulo = "Listagem/Pesquisa de Registros";

        $list = $this->repository->paginate();

        return view('admin.estabelecimentos.index', compact('list', 'titulo', 'subtitulo'));
    }

    public function create(){
        $titulo = "Estabelecimentos";

        $subtitulo = "Novo Registro";

        return view('admin.estabelecimentos.create', compact('titulo', 'subtitulo'));
    }

    public function show($id)
    {
        try {
            $entity = $this->repository->find($id);

            $titulo = "Estabelecimentos";

            $subtitulo = "Visualizar Registro #{$entity->id}";

            return view('admin.estabelecimentos.show', compact('entity', 'titulo', 'subtitulo'));
        } catch (\Exception $ex)
        {
            return redirect()->route('admin.estabelecimentos.index')->with('warning', "O registro #{$id} não foi localizado: {$ex->getMessage()}" );
        }
    }

    public function printReport($id)
    {
        try {
            $entity = $this->repository->find($id);

            $titulo = "Dados do Estabelecimentos";

            $subtitulo = "Visualizar Registro #{$entity->id}";

            return view('admin.estabelecimentos.print', compact('entity', 'titulo', 'subtitulo'));
        } catch (\Exception $ex)
        {
            return redirect()->route('admin.estabelecimentos.index')->with('warning', "O registro #{$id} não foi localizado: {$ex->getMessage()}" );
        }
    }

    public function edit($id){
        try {
            $entity = $this->repository->find($id);

            $titulo = "Estabelecimentos";

            $subtitulo = "Editar Registro #{$entity->id}";

            return view('admin.estabelecimentos.edit', compact('entity', 'titulo', 'subtitulo'));
        } catch (\Exception $ex)
        {
            return redirect()->route('admin.estabelecimentos.index')->with('warning', "O registro #{$id} não foi localizado: {$ex->getMessage()}" );
        }
    }

    public function store(AdminEstabelecimentoRequest $request){
        try
        {
            $data = $request->all();

            $data['icone'] = $this->saveImage($request);

            $entity = $this->repository->create($data);

            return redirect()->route('admin.estabelecimentos.show', ['id' => $entity->id])->with('success', "Registro #{$entity->id} cadastrado com sucesso");
        }
        catch (\Exception $ex)
        {
            return redirect()->route('admin.estabelecimentos.index')->with('warning', "Não foi possível salvar o registro: {$ex->getMessage()}");
        }
    }

    public function update(AdminEstabelecimentoRequest $request, $id){
        try
        {
            $entity = $this->repository->find($id);

            $data = $request->all();

            $data['icone'] = $this->saveImage($request, $entity->icone);

            $this->repository->update($data,$id);

            return redirect()->route('admin.estabelecimentos.show', [ 'id' => $entity->id ])->with('success', "O registro {$entity->id} foi atualizado com sucesso");
        }
        catch (\Exception $ex)
        {
            return redirect()->route('admin.estabelecimentos.index')->with('warning', "Não foi possível salvar o registro: {$ex->getMessage()}");
        }
    }

    private function saveImage(AdminEstabelecimentoRequest $request, $icone=null)
    {
        $data = $request->all();

        $fileName = empty($icone) ? 'logo.jpg' : $icone;

        if (isset($data['icone']) && !empty($data['icone']))
        {
            $extention = $request->file('icone')->getClientOriginalExtension();
            $fileName = random_int(11111, 99999) . "_" . str_slug($data['nome']) . "." . $extention;
            Image::make($request->file('icone'))
                ->resize(150, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(base_path() . "/public/images/estabelecimentos/{$fileName}")
            ;

        }
        return $fileName;
    }

    public function destroy($id)
    {
        try {
            $entity = $this->repository->find($id);

            $this->repository->delete($id);

            return redirect()->route('admin.estabelecimentos.index')->with('success', "A Registro #{$entity->id} foi excluído com sucesso");
        } catch (\Exception $ex)
        {
            return redirect()->route('admin.estabelecimentos.index')->with('warning', "Problemas com o registro #{$id} {$ex->getMessage()}");
        }
    }

    public function destroySelected(Request $request)
    {
        $ids = $request->all();

        if (empty($ids['id']))
        {
            return redirect()->route('admin.estabelecimentos.index')->with('warning', "Nenhhum registro foi selecionado");
        }

        foreach ($ids['id'] as $id) {
            $this->repository->delete($id);
        }

        return redirect()->route('admin.estabelecimentos.index')->with('success', "Os registros foram excluídos com sucesso");
    }
}
