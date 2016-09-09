<?php

namespace CodeDelivery\Http\Controllers\Api;

use CodeDelivery\Http\Controllers\Controller;
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

}
