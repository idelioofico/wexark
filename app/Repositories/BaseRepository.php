<?php

namespace App\Repositories;

use stdClass;

class BaseRepository
{
    protected $obj;

    public function __construct(object $obj)
    {
        $this->obj = $obj;
    }

    public function all(): object
    {
      return $this->obj->all();
    }

    public function store(array $attributes): object
    {
        // return $this->obj->store($attributes);
        return new stdClass;
    }

    public function find(int $id): object
    {
        return $this->obj->find($id);
    }

    public function update(array $attributes, int $id): bool
    {
        return $this->obj->find($id)->update($attributes);
    }

    public function delete(int $id): bool
    {
        return $this->obj->find($id)->delete();
    }
}
