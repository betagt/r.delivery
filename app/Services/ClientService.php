<?php
/**
 * Created by PhpStorm.
 * User: dsoft
 * Date: 05/08/2016
 * Time: 17:45
 */

namespace CodeDelivery\Services;


use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Repositories\UserAddressRepository;
use CodeDelivery\Repositories\UserRepository;

class ClientService
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var UserAddressRepository
     */
    private $addressRepository;

    public function __construct(UserAddressRepository $addressRepository, UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->addressRepository = $addressRepository;
    }

    public function update(array $data, $id)
    {
        $this->addressRepository->update($data, $id);

        $userId = $this->addressRepository->find($id, ['user_id'])->user_id;

        $this->userRepository->update($data['user'], $userId);
    }

    public function create(array $data)
    {
        $data['user']['password'] = bcrypt('123456');
        $data['user']['dica_senha'] = 'um dois três quatro cinco seis';

        $user = $this->userRepository->create($data['user']);

        $data['user_id'] = $user->id;
        return $this->addressRepository->create($data);
    }
}