<?php

namespace CodeDelivery\Http\Controllers\Admin\Contracts;

use CodeDelivery\Http\Requests\Admin\OrderItemRequest;

interface IOrderItemsController
{
    public function store(OrderItemRequest $request);

    public function update(OrderItemRequest $request, $id);
}