<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SubjectsRepository extends BaseRepository
{
    public function __construct(Model $model, array $relationships, array $relationshipsInList)
    {
        parent::__construct($model, $relationships, $relationshipsInList);
    }

    public function create($data)
    {
        $data['name_slug'] = Str::slug($data['name']);

        return parent::create($data);
    }
}
