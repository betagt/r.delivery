<?php

namespace CodeDelivery\Http\Controllers\Admin\Contracts;

use CodeDelivery\Http\Requests\Admin\ProductRequest;

interface IProductsController
{
    public function store(ProductRequest $request);

    public function update(ProductRequest $request, $id);
}