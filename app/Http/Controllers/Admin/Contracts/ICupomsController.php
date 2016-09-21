<?php

namespace CodeDelivery\Http\Controllers\Admin\Contracts;

use CodeDelivery\Http\Requests\Admin\CupomRequest;

interface ICupomsController
{
    public function store(CupomRequest $request);

    public function update(CupomRequest $request, $id);
}