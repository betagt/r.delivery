<?php

namespace CodeDelivery\Http\Controllers\Api;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Models\Cidade;
use CodeDelivery\Repositories\CidadeRepository;
use CodeDelivery\Repositories\CupomRepository;
use CodeDelivery\Repositories\EstadoRepository;

class UtilController extends Controller
{
    /**
     * @var CidadeRepository
     */
    private $cidadeRepository;
    /**
     * @var EstadoRepository
     */
    private $estadoRepository;

    public function __construct(CidadeRepository $cidadeRepository,EstadoRepository $estadoRepository)
    {
        $this->cidadeRepository = $cidadeRepository;
        $this->estadoRepository = $estadoRepository;
    }


    public function cep($cep){
        $string = file_get_contents('http://viacep.com.br/ws/'.$cep.'/json/');

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
