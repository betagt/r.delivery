<?php

namespace CodeDelivery\Http\Controllers\Admin\Contracts;

use CodeDelivery\Http\Requests\Admin\EstabelecimentoRequest;

interface IEstabelecimentosController
{
    public function store(EstabelecimentoRequest $request);

    public function update(EstabelecimentoRequest $request, $id);
}