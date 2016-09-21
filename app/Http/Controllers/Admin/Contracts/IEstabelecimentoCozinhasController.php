<?php

namespace CodeDelivery\Http\Controllers\Admin\Contracts;

use CodeDelivery\Http\Requests\Admin\EstabelecimentoCozinhaRequest;

interface IEstabelecimentoCozinhasController
{
    public function store(EstabelecimentoCozinhaRequest $request);

    public function update(EstabelecimentoCozinhaRequest $request, $id);
}