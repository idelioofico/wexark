<?php

namespace App\Interfaces;

use App\Http\Requests\PastelRequest;


interface IPastel
{

    public function all();

    public function store(PastelRequest $request);

    public function find(int $id);

    public function update(PastelRequest $request, int $id);

    public function delete(int $id);
}
