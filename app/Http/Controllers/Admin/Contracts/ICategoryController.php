<?php

namespace CodeDelivery\Http\Controllers\Admin\Contracts;

use CodeDelivery\Http\Requests\Admin\CategoryRequest;

interface ICategoryController
{
    public function store($estabelecimento_id, CategoryRequest $request);

    public function update($estabelecimento_id, CategoryRequest $request, $id);
}