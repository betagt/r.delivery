<?php

namespace CodeDelivery\Http\Controllers\Admin\Contracts;

use CodeDelivery\Http\Requests\Admin\AvaliacaoRequest;

interface IAvaliacoesController
{
    public function store(AvaliacaoRequest $request);

    public function update(AvaliacaoRequest $request, $id);
}