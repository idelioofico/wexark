<?php

namespace App\Services;

use App\Helpers\File;
use App\Interfaces\IPastel;
use App\Http\Requests\PastelRequest;
use App\Repositories\PastelRepository;
use Database\Factories\PastelFactory;

class PastelService implements IPastel
{
    protected $pastelRespository;
    private $path;

    public function __construct(PastelRepository $pastelRepository)
    {
        $this->pastelRespository = $pastelRepository;
        $this->path = "pasteis";
    }

    public function all()
    {
        return $this->pastelRespository->all()->toArray();
    }

    public function store(PastelRequest $request)
    {
        $attributes = $request->all();
        if ($request->hasFile('foto'))
            $attributes['foto'] = File::Upload($this->path, $attributes['foto']);
        return $this->pastelRespository->store($attributes);
    }

    public function find(int $id)
    {
        return $this->pastelRespository->find($id);
    }

    public function update(PastelRequest $request, int $id)
    {
        $attributes = $request->all();
        if ($request->hasFile('foto'))
            $attributes['foto'] = File::Upload($this->path, $attributes['foto']); //File Helper for uploads
        return $this->pastelRespository->update($attributes, $id);
    }

    public function delete(int $id)
    {
        return $this->pastelRespository->delete($id);
    }
}
