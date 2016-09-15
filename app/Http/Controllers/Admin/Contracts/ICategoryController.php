<?php

namespace CodeDelivery\Http\Controllers\Admin\Contracts;

use CodeDelivery\Http\Requests\Admin\CategoryRequest;

interface ICategoryController
{
    public function store(CategoryRequest $request);

    public function update(CategoryRequest $request, $id);
}