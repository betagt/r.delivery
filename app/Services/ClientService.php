<?php
/**
 * Created by PhpStorm.
 * User: dsoft
 * Date: 05/08/2016
 * Time: 17:45
 */

namespace CodeDelivery\Services;


use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Repositories\UserRepository;

class ClientService
{
    /**
     * @var ClientRepository
     */
    private $clientRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(ClientRepository $clientRepository, UserRepository $userRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->userRepository = $userRepository;
    }

    public function update(array $data, $id)
    {
        $this->clientRepository->update($data, $id);

        $userId = $this->clientRepository->find($id, ['user_id'])->user_id;

        $this->userRepository->update($data['user'], $userId);
    }

    public function create(array $data)
    {
        $data['user']['password'] = bcrypt('123456');
        $data['user']['dica_senha'] = 'um dois três quatro cinco seis';

        $user = $this->userRepository->create($data['user']);

        $data['user_id'] = $user->id;
        return $this->clientRepository->create($data);
    }
}