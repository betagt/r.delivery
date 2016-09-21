<?php

namespace CodeDelivery\Http\Controllers\Admin\Contracts;

use CodeDelivery\Http\Requests\Admin\ProcaoCategoryProductRequest;

interface IProcaoCategoryProductController
{
    public function store(ProcaoCategoryProductRequest $request);

    public function update(ProcaoCategoryProductRequest $request, $id);
}