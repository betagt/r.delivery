<?php

namespace CodeDelivery\Http\Controllers\Admin\Contracts;

use CodeDelivery\Http\Requests\Admin\UserAddressRequest;

interface IUserAddressesController
{
    public function store(UserAddressRequest $request);

    public function update(UserAddressRequest $request, $id);
}