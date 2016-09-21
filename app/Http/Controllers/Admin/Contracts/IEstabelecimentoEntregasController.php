<?php

namespace CodeDelivery\Http\Controllers\Admin\Contracts;

use CodeDelivery\Http\Requests\Admin\EstabelecimentoEntregaRequest;

interface IEstabelecimentoEntregasController
{
    public function store(EstabelecimentoEntregaRequest $request);

    public function update(EstabelecimentoEntregaRequest $request, $id);
}