<?php

namespace CodeDelivery\Http\Controllers\Admin\Contracts;

use CodeDelivery\Http\Requests\Admin\UserRequest;

interface IUsersController
{
    public function store(UserRequest $request);

    public function update(UserRequest $request, $id);
}