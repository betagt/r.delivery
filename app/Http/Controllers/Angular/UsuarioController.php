<?php

namespace CodeDelivery\Http\Controllers\Angular;


use Illuminate\Support\Facades\Response;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Http\Requests\Admin\UploadRequest;
use CodeDelivery\Http\Requests\Admin\UserRequest;
use CodeDelivery\Repositories\UserRepository;

class UsuarioController extends Controller
{
    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * UserController constructor.
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function update(UserRequest $request, $id)
    {
        $entity = $this->repository->find($id);

        $data = $request->all();

        $this->repository->update($data, $entity->id);

        return Response::json(
            [
                "data" => "Registro {$entity->titulo} alterado com sucesso",
                "id" => $entity->id
            ]
        );
    }

    public function upload(UploadRequest $request)
    {
        $file = $request->file('file');

        $path = "images/usuarios";

        $ext = $file->getClientOriginalExtension();
        $fileName = random_int(1111,9999) .'.'.$ext;
        $file->move($path, $fileName);

        return $fileName;
    }
}
