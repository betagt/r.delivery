<?php

namespace CodeDelivery\Http\Controllers\Api;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Models\Cidade;
use CodeDelivery\Repositories\CidadeRepository;
use CodeDelivery\Repositories\CupomRepository;
use CodeDelivery\Repositories\EstadoRepository;
use CodeDelivery\Services\CepService;
use Illuminate\Http\Request;

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
    /**
     * @var CepService
     */
    private $cepService;

    public function __construct(CidadeRepository $cidadeRepository, EstadoRepository $estadoRepository, CepService $cepService)
    {
        $this->cidadeRepository = $cidadeRepository;
        $this->estadoRepository = $estadoRepository;
        $this->cepService = $cepService;
    }


    public function cep($cep)
    {
        $urlUri = 'http://viacep.com.br/ws/' . $cep . '/json/';
        return $this->cepService->requestCep($urlUri);
    }

    public function cepLocation(Request $request)
    {
        $urlUri = 'http://viacep.com.br/ws/' . $request->get('estado') . '/' . $request->get('cidade') . '/' . $request->get('logradouro') . '/json/';
        $string = file_get_contents($urlUri);
        return json_decode($string);
    }

}
