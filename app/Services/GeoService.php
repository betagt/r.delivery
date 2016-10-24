<?php
/**
 * Created by PhpStorm.
 * User: dsoft
 * Date: 05/08/2016
 * Time: 17:45
 */

namespace CodeDelivery\Services;



use CodeDelivery\Models\GeoPosition;
use CodeDelivery\Repositories\GeoPositionRepository;

class GeoService
{


    /**
     * @var GeoPosition
     */
    private $geoPosition;

    public function __construct(GeoPositionRepository $geoPosition)
    {

        $this->geoPosition = $geoPosition;
    }

    public function distanceCalculate($origens,$destinos){
        $cachePosition =  $this->geoPosition->skipPresenter(false)->getPosition($origens,$destinos);
        if($cachePosition){
            return $cachePosition;
        }

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
        foreach ($response_a['rows'] as $v => $item){
            foreach ($item['elements'] as $key=>$value){
                $distanciaTotal +=floatval(str_replace(',','.',str_replace(' km','',$value['distance']['text'])));
            }
        }
        $total = ($distanciaTotal*2)*0.41;
        return $this->geoPosition->create([
            'lat_log_origens'=>$origens,
            'lat_log_destinos'=>$destinos,
            'price' =>floatval($total)
        ]);
    }

    public function getSinglePosition($cidade,$endereco,$estado){
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
        //dd('lat =>'.$response_a->results[0]->geometry->location->lat. ' long =>'.$response_a->results[0]->geometry->location->lng);
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