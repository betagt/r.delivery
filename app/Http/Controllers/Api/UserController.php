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

    public function authenticated(){
        $id = Authorizer::getResourceOwnerId();
        $products = $this->repository->skipPresenter(false)->find($id);
        return $products;
    }

    public function updateDeviceToken(Request $request){
        $id = Authorizer::getResourceOwnerId();
        $deviceToken = $request->get('device_token');
        return $this->repository->updateDeviceToken($id,$deviceToken);
    }

    public function updateFone(Request $request){
        $id = Authorizer::getResourceOwnerId();
        $telefoneCelular = $request->get('telefone_celular');
        return $this->repository->updateFone($id,$telefoneCelular);
    }

    public function updateUser(AdminUserRequest $request)
    {
        $id = Authorizer::getResourceOwnerId();

        try {
            $entity = $this->repository->find($id);

            $this->repository->update($request->all(), $entity->id);

            return $this->repository->skipPresenter(false)->find($id);

        } catch (\Exception $ex)
        {
            return abort($ex->getCode(), $ex->getMessage());
        }
    }

    public function storeUser(AdminUserRequest $request)
    {
        try {
            $user = $this->repository->create($request->all());

            return $this->repository->skipPresenter(false)->find($user->id);

        } catch (\Exception $ex)
        {
            return abort($ex->getCode(), $ex->getMessage());
        }
    }

}
