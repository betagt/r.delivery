<?php

namespace CodeDelivery\Http\Controllers\Api;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Http\Requests\AdminUserRequest;
use CodeDelivery\Repositories\UserRepository;
use Illuminate\Http\Request;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class UserController extends Controller
{
    private $repository;

    public function __construct(
        UserRepository $repository
    )
    {
        $this->repository = $repository;

    }

    public function authenticated()
    {
        $id = Authorizer::getResourceOwnerId();
        $products = $this->repository->skipPresenter(false)->find($id);
        return $products;
    }

    public function updateDeviceToken(Request $request)
    {
        $id = Authorizer::getResourceOwnerId();
        $deviceToken = $request->get('device_token');
        return $this->repository->updateDeviceToken($id, $deviceToken);
    }

    public function updateFone(Request $request)
    {
        $id = Authorizer::getResourceOwnerId();
        $telefoneCelular = $request->get('telefone_celular');
        return $this->repository->updateFone($id, $telefoneCelular);
    }

    public function updateUser(AdminUserRequest $request)
    {
        $id = Authorizer::getResourceOwnerId();

        try {
            $entity = $this->repository->find($id);

            $data = $request->all();

            if (!empty($data['password'])) {
                $data['password'] = bcrypt($data['password']);
            }

            $this->repository->update($data, $entity->id);

            return $this->repository->skipPresenter(false)->find($id);

        } catch (\Exception $ex) {
            return abort($ex->getCode(), $ex->getMessage());
        }
    }

    public function storeUser(AdminUserRequest $request)
    {
        try {
            $data = $request->all();

            $data['password'] = bcrypt($data['password']);

            $user = $this->repository->create($data);

            return $this->repository->skipPresenter(false)->find($user->id);

        } catch (\Exception $ex) {
            return abort($ex->getCode(), $ex->getMessage());
        }
    }

    public function rememberMe(Request $request)
    {
        $email = $request->get('email');

        if (empty($email))
            return abort(403, 'O E-mail é obrigatório');

        try {
            return $this->repository->skipPresenter(false)->scopeQuery(function ($query) use ($email) {
                return $query->where('email', '=', $email);
            })->first();
        } catch (\Exception $ex) {
            return abort($ex->getCode(), $ex->getMessage());
        }
    }

}
