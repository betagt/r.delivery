<?php

namespace CodeDelivery\Http\Controllers\Admin\Contracts;

use CodeDelivery\Http\Requests\Admin\ContatoRequest;

interface IContatosController
{
    public function store(ContatoRequest $request);

    public function update(ContatoRequest $request, $id);
}