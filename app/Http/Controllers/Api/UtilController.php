<?php

namespace CodeDelivery\Http\Controllers\Api;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Models\Cidade;
use CodeDelivery\Repositories\CidadeRepository;
use CodeDelivery\Repositories\CupomRepository;
use CodeDelivery\Repositories\EstadoRepository;
use CodeDelivery\Services\CepService;
use CodeDelivery\Services\GeoService;
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
    /**
     * @var GeoService
     */
    private $geoService;

    public function __construct(CidadeRepository $cidadeRepository, EstadoRepository $estadoRepository, CepService $cepService,GeoService $geoService)
    {
        $this->cidadeRepository = $cidadeRepository;
        $this->estadoRepository = $estadoRepository;
        $this->cepService = $cepService;
        $this->geoService = $geoService;
    }

    public function cep($cep)
    {
        $urlUri = 'http://viacep.com.br/ws/' . $cep . '/json/';
        return $this->cepService->requestCep($urlUri);
    }

    public function distanceCalculate(Request $request){
        //$destinoInicial = "|-10.1836952,-48.3100962";
        return $this->geoService->distanceCalculate($request->get('origens'),$request->get('destinos'));
    }

    public function cepLocation(Request $request)
    {
        $urlUri = 'http://viacep.com.br/ws/' . $request->get('estado') . '/' . $request->get('cidade') . '/' . $request->get('logradouro') . '/json/';
        $string = file_get_contents($urlUri);
        return json_decode($string);
    }

}
