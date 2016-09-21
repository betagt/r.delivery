<?php
/**
 * Created by PhpStorm.
 * User: dsoft
 * Date: 05/08/2016
 * Time: 17:45
 */

namespace CodeDelivery\Services;


use CodeDelivery\Repositories\CidadeRepository;
use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Repositories\EstadoRepository;
use CodeDelivery\Repositories\UserAddressRepository;
use CodeDelivery\Repositories\UserRepository;

class CepService
{

    /**
     * @var CidadeRepository
     */
    private $cidadeRepository;
    /**
     * @var EstadoRepository
     */
    private $estadoRepository;

    public function __construct(CidadeRepository $cidadeRepository, EstadoRepository $estadoRepository)
    {

        $this->cidadeRepository = $cidadeRepository;
        $this->estadoRepository = $estadoRepository;
    }

    public function requestCep($urlUri){
        $string = file_get_contents($urlUri);

        $json_file = json_decode($string, true);
        $estado = $this->estadoRepository->findWhere([
            ['uf','=',$json_file['uf']]
        ])->first();
        if(!$estado){
            abort(301,'Estado não encontrado');
        }

        $result = $this->cidadeRepository->skipPresenter(false)->findWhere([
            ['estado_id','=',$estado->id],
            ['nome','like',$json_file['localidade']]
        ]);
        if($result){
            $result['data'] = current($result['data']);
        }
        $json_file = array_merge($json_file,$result);
        return $json_file;
    }
}