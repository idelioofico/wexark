<?php

namespace App\Services;

use App\Helpers\File;
use App\Http\Requests\ClienteRequest;
use App\Interfaces\ICliente;
use App\Repositories\ClienteRepository;


class ClienteService implements ICliente
{
    protected $clienteRepository;
  

    public function __construct(ClienteRepository $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    public function all()
    {
        return $this->clienteRepository->all()->toArray();
    }

    public function store(ClienteRequest $request)
    {
        $attributes = $request->all();
        return $this->clienteRepository->store($attributes);
    }

    public function find(int $id)
    {
        return $this->clienteRepository->find($id);
    }

    public function update(ClienteRequest $request, int $id)
    {
        $attributes = $request->all();
        return $this->clienteRepository->update($attributes, $id);
    }

    public function delete(int $id)
    {
        return $this->clienteRepository->delete($id);
    }
}
