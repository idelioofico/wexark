<?php

namespace App\Interfaces;

use App\Http\Requests\ClienteRequest;


interface ICliente
{

    public function all();

    public function store(ClienteRequest $request);

    public function find(int $id);

    public function update(ClienteRequest $request, int $id);

    public function delete(int $id);
}
