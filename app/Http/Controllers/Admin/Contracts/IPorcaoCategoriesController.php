<?php

namespace CodeDelivery\Http\Controllers\Admin\Contracts;

use CodeDelivery\Http\Requests\Admin\PorcaoCategoryRequest;

interface IPorcaoCategoriesController
{
    public function store(PorcaoCategoryRequest $request);

    public function update(PorcaoCategoryRequest $request, $id);
}