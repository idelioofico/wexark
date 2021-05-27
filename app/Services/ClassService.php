<?php

namespace App\Services;

use App\Http\Requests\TeamRequest;
use App\Models\Team;
use App\Repositories\ClassRepository;
use Illuminate\Http\Request;

class ClassService
{
    protected $classRepository;

    public function __construct(ClassRepository $classRepository)
    {
        $this->classRepository = $classRepository;
    }

    public function store(Request $request)
    {
        $attributes = $request->all();
        $attributes['code']="TR-0".Team::count();
        if ($this->classRepository->store($attributes))
            return true;
        return false;
    }

    public function update(Request $request, Team $team)
    {
        $attributes = $request->all();
        if ($this->classRepository->update($team->id, $attributes))
            return true;
        return false;
    }
}
