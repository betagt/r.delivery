<?php

namespace CodeDelivery\Http\Controllers\Admin\Contracts;

use CodeDelivery\Http\Requests\Admin\CidadeRequest;

interface ICidadesController
{
    public function store(CidadeRequest $request, $fk);

    public function update(CidadeRequest $request, $fk, $id);
}