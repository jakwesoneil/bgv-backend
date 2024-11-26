<?php

namespace App\Services;

use App\Models\Subject;
use App\Repositories\SubjectsRepository;

class SubjectsService extends SubjectsRepository
{
    public function __construct(Subject $model)
    {
        parent::__construct($model, [], []);
    }
}
