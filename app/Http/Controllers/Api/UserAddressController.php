<?php

namespace CodeDelivery\Http\Controllers\Api;

use CodeDelivery\Http\Requests\AdminUserAddressRequest;
use CodeDelivery\Repositories\UserAddressRepository;
use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Services\GeoService;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class UserAddressController extends Controller
{
    /**
     * @var UserAddressRepository
     */
    private $repository;
    /**
     * @var GeoService
     */
    private $geoService;

    public function __construct(UserAddressRepository $repository, GeoService $geoService)
    {
        $this->repository = $repository;
        $this->geoService = $geoService;
    }

    public function index(){
        $id = Authorizer::getResourceOwnerId();
        $addresses = $this->repository
            ->skipPresenter(false)
            ->scopeQuery(function ($query) use ($id) {
                return $query->where('user_id', '=', $id)->where('status', '=', 1);
            })->all();
        return $addresses;
    }
    public function show($id){
        $addresses = $this->repository
            ->skipPresenter(false)
            ->find($id);
        return $addresses;
    }

    public function store(AdminUserAddressRequest $request)
    {
        $data = $request->all();

        $data['user_id'] = Authorizer::getResourceOwnerId();
        $location = $this->geoService->getSinglePosition($data['address'],$data['city'],$data['state']);
        $data['latitude'] = $location['lat'];
        $data['longetude'] = $location['long'];
        return $this->repository->create($data);
    }

    public function update($id, AdminUserAddressRequest $request)
    {
        try
        {
            $entity = $this->repository->find($id);

            $data = $request->all();
            $location = $this->geoService->getSinglePosition($data['address'],$data['city'],$data['state']);
            $data['latitude'] = $location['lat'];
            $data['longetude'] = $location['long'];

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
