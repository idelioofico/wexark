<?php

namespace App\Services;

use App\Repositories\GradeRepository;

class GradeService
{

    protected $gradeService;

    public function __construct(GradeRepository $gradeRepository)
    {
        $this->gradeService = $gradeRepository;
    }
}
