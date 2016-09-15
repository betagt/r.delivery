<?php

namespace CodeDelivery\Http\Controllers\BetaGT\Contracts;

use CodeDelivery\Http\Requests\Request;

interface ISimpleController
{
    public function index();

    public function create();

    public function edit($id);

    public function show($id);

    public function printReport($id);

    public function destroy($id);

    public function destroySelected(Request $request);
}