<?php

namespace CodeDelivery\Http\Controllers\Admin\Contracts;

use CodeDelivery\Http\Requests\Admin\CozinhaRequest;

interface ICozinhasController
{
    public function store(CozinhaRequest $request);

    public function update(CozinhaRequest $request, $id);
}