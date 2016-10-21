<?php
/**
 * Created by PhpStorm.
 * User: dsoft
 * Date: 05/08/2016
 * Time: 17:45
 */

namespace CodeDelivery\Services;



class GeoService
{


    public function __construct()
    {

    }

    public function distanceCalculate($origens,$destinos){
        //para varios destinos
        //-10.1846156,-48.3312915|-10.1918945,-48.33133
        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=$origens&destinations=$destinos&mode=driving&language=pt-BR";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $response_a = [];
        $response_a = json_decode($response, true);
        if($response_a['rows'][0]['elements'][0]['status']=='ZERO_RESULTS'){
            abort(303,'Localização não encontrada');
        }
        $distanciaTotal = 0;
        foreach ($response_a['rows'][0]['elements'] as $key=>$value){
            $distanciaTotal +=floatval(str_replace(',','.',str_replace(' km','',$value['distance']['text'])));
        }
        return($distanciaTotal*0.41)*2;
    }

    private function getSinglePosition($cidade,$endereco,$estado){
        $address = urlencode($cidade.','.$endereco.','.$estado);
        $url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=Brazil";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $response_a = json_decode($response);
        $status = $response_a->status;
        dd('lat =>'.$response_a->results[0]->geometry->location->lat. ' long =>'.$response_a->results[0]->geometry->location->lng);
        if ( $status == 'ZERO_RESULTS' )
        {
            return FALSE;
        }
        else
        {
            $return = array('lat' => $response_a->results[0]->geometry->location->lat, 'long' => $long = $response_a->results[0]->geometry->location->lng);
            return $return;
        }
    }
}