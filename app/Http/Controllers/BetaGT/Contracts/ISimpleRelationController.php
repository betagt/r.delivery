<?php

namespace CodeDelivery\Http\Controllers\BetaGT\Contracts;

use CodeDelivery\Http\Requests\Request;

interface ISimpleRelationController
{
    public function index($fk);

    public function create($fk);

    public function edit($fk, $id);

    public function show($fk, $id);

    public function printReport($fk, $id);

    public function destroy($fk, $id);

    public function destroySelected(Request $request, $fk);
}