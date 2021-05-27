<?php

namespace App\Services;

use App\Http\Requests\TeamRequest;
use App\Repositories\StudentRepository;

class StudentService
{
    protected $studentRepository;
    protected $gradeService;

    public function __construct(StudentRepository $studentRepository, GradeService $gradeService)
    {
        $this->studentRepository = $studentRepository;
        $this->gradeService = $gradeService;
    }


  
} 
