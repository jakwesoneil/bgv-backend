<?php

namespace App\Services;

use App\Models\LectureExam;
use App\Repositories\LectureExamsRepository;

class LectureExamsService extends LectureExamsRepository
{
    public function __construct(LectureExam $model)
    {
        parent::__construct($model, [], []);
    }
}
