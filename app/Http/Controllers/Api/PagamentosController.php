<?php

namespace CodeDelivery\Http\Controllers\Api;

use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;

class PagamentosController extends Controller
{
   public function getSessionId(){
       $credentials = \PagSeguroConfig::getAccountCredentials();
       return [
           'sessionId'=>\PagSeguroSessionService::getSession($credentials),
       ];
   }
}
