<?php

namespace CodeDelivery\Http\Controllers\Ajax;

use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Controllers\Controller;

class TokenController extends Controller
{
    public function getToken()
    {
        return csrf_token();
    }
}
