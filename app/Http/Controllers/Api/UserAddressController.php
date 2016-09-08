<?php

namespace CodeDelivery\Http\Controllers\Api;

use CodeDelivery\Http\Requests\AdminUserAddressRequest;
use CodeDelivery\Repositories\UserAddressRepository;
use CodeDelivery\Http\Controllers\Controller;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class UserAddressController extends Controller
{
    /**
     * @var UserAddressRepository
     */
    private $repository;

    public function __construct(UserAddressRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(){
        $id = Authorizer::getResourceOwnerId();
        $addresses = $this->repository
            ->skipPresenter(false)
            ->findByField('user_id',$id);
        return $addresses;
    }

    public function store(AdminUserAddressRequest $request)
    {
        $data = $request->all();

        $data['user_id'] = Authorizer::getResourceOwnerId();

        return $this->repository->create($data);
    }

    public function update($id, AdminUserAddressRequest $request)
    {
        try
        {
            $entity = $this->repository->find($id);

            $data = $request->all();

            return $this->repository->update($data, $entity->id);

        } catch (\Exception $ex)
        {
            return response()->json(['error' => $ex->getMessage()], 500) ;
        }
    }

    public function destroy($id)
    {
        try
        {
            $entity = $this->repository->find($id);

            $data = [ 'status' => 0 ];

            return $this->repository->update($data, $entity->id);

        } catch (\Exception $ex)
        {
            return response()->json(['error' => $ex->getMessage()], 500) ;
        }
    }

    public function restore($id)
    {
        try
        {
            $entity = $this->repository->find($id);

            $data = [ 'status' => 1 ];

            return $this->repository->update($data, $entity->id);

        } catch (\Exception $ex)
        {
            return response()->json(['error' => $ex->getMessage()], 500) ;
        }
    }
}
