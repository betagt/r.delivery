<?php

namespace CodeDelivery\Http\Controllers\Admin\Contracts;

use CodeDelivery\Http\Requests\Admin\OrderAvaliacaoItemRequest;

interface IOrderAvaliacaoItemsController
{
    public function store(OrderAvaliacaoItemRequest $request);

    public function update(OrderAvaliacaoItemRequest $request, $id);
}