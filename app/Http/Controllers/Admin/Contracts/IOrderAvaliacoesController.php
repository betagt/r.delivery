<?php

namespace CodeDelivery\Http\Controllers\Admin\Contracts;

use CodeDelivery\Http\Requests\Admin\OrderAvaliacaoRequest;

interface IOrderAvaliacoesController
{
    public function store(OrderAvaliacaoRequest $request);

    public function update(OrderAvaliacaoRequest $request, $id);
}