<?php

namespace CodeDelivery\Http\Controllers\Api;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Repositories\CupomRepository;

class UtilController extends Controller
{


    public function cep($cep){
        $string = file_get_contents('http://viacep.com.br/ws/'.$cep.'/json/');
        $json_file = json_decode($string, true);
        return $json_file;
    }

}
