<?php

namespace CodeDelivery\Http\Controllers\Admin\Contracts;

use CodeDelivery\Http\Requests\Admin\EstabelecimentoFuncionamentoRequest;

interface IEstabelecimentoFuncionamentosController
{
    public function store(EstabelecimentoFuncionamentoRequest $request);

    public function update(EstabelecimentoFuncionamentoRequest $request, $id);
}