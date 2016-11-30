<?php

namespace CodeDelivery\Http\Controllers\Angular;

use CodeDelivery\Http\Controllers\Controller;

class TokenController extends Controller
{
    public function getToken()
    {
        return csrf_token();
    }
}
