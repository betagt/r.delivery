<?php

namespace CodeDelivery\Http\Controllers\Admin\Contracts;

use CodeDelivery\Http\Requests\Admin\OrderDeliveryAddressRequest;

interface IOrderDeliveryAddressesController
{
    public function store(OrderDeliveryAddressRequest $request);

    public function update(OrderDeliveryAddressRequest $request, $id);
}