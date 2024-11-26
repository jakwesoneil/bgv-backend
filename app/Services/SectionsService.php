<?php

namespace App\Services;

use App\Models\Section;
use App\Repositories\SectionsRepository;

class SectionsService extends SectionsRepository
{
    public function __construct(Section $model)
    {
        parent::__construct($model, [], []);
    }
}
