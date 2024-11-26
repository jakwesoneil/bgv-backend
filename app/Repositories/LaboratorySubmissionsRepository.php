<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class LaboratorySubmissionsRepository extends BaseRepository
{
    public function __construct(Model $model, array $relationships, array $relationshipsInList)
    {
        parent::__construct($model, $relationships, $relationshipsInList);
    }
}
