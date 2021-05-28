<?php

namespace App\Repositories;

use App\Models\Pastel;

class PastelRepository extends BaseRepository
{
    public function __construct(Pastel $pastel)
    {
        parent::__construct($pastel);
    }
}
