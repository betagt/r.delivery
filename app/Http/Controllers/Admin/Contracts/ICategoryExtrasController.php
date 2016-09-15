<?php

namespace CodeDelivery\Http\Controllers\Admin\Contracts;

use CodeDelivery\Http\Requests\Admin\CategoryExtraRequest;

interface ICategoryExtrasController
{
    public function store(CategoryExtraRequest $request, $fk);

    public function update(CategoryExtraRequest $request, $fk, $id);
}