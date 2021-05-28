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
        $attributes['foto'] = File::Upload($this->path, $attributes['foto']);

        if (($createdPastel = $this->pastelRespository->store($attributes))) {
            return $createdPastel;
        } else {
            //Delete uploaded phot is pastel not store
            File::Delete($attributes['foto']);
        }
        return;
    }

    public function find(int $id)
    {
        return $this->pastelRespository->find($id);
    }

    public function update(PastelRequest $request, int $id)
    {
        $attributes = $request->all();
        return $this->pastelRespository->update($attributes, $id);
    }

    public function delete(int $id)
    {
        return $this->pastelRespository->delete($id);
    }
}
