<?php

namespace App\Repositories;



class BaseRepository
{

    protected $obj;
    public function __construct(object $obj)
    {
        $this->obj = $obj;
    }

    public function getAll(): object
    {
        return $this->obj->all();
    }
    public function store(array $attributes): object
    {
        return $this->obj->create($attributes);
    }

    public function find(int $id): object
    {
        return $this->obj->find($id);
    }

    public function update(int $id, array $attributes): bool
    {
        if ($this->find($id)->update($attributes))
            return true;
        return false;
    }

    public function findByColumn(string $column, $value): object
    {
        return $this->obj->where($column, $value);
    }

    public function delete(int $id): bool
    {
        return $this->obj->find($id)->delete();
    }
}
