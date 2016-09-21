<?php

namespace CodeDelivery\Http\Controllers\Admin\Contracts;

use CodeDelivery\Http\Requests\Admin\OrderRequest;

interface IOrdersController
{
    public function store(OrderRequest $request);

    public function update(OrderRequest $request, $id);
}