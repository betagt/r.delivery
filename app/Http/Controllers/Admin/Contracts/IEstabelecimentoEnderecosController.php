<?php

namespace CodeDelivery\Http\Controllers\Admin\Contracts;

use CodeDelivery\Http\Requests\Admin\EstabelecimentoEnderecoRequest;

interface IEstabelecimentoEnderecosController
{
    public function store(EstabelecimentoEnderecoRequest $request);

    public function update(EstabelecimentoEnderecoRequest $request, $id);
}