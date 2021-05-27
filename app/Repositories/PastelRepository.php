<?php

namespace App\Repositories;
use App\Models\Grade;


class PastelRepository extends BaseRepository
{

    public function __construct(Grade $grade)
    {
        parent::__construct($grade);
    }
}
