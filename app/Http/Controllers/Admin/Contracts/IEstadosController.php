<?php

namespace CodeDelivery\Http\Controllers\Admin\Contracts;

use CodeDelivery\Http\Requests\Admin\EstadoRequest;

interface IEstadosController
{
    public function store(EstadoRequest $request);

    public function update(EstadoRequest $request, $id);
}