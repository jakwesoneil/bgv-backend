<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LecturesRepository extends BaseRepository
{
    public function __construct(Model $model, array $relationships, array $relationshipsInList)
    {
        parent::__construct($model, $relationships, $relationshipsInList);
    }

    public function create($data)
    {
        $data['title_slug'] = Str::slug($data['title']);

        return parent::create($data);
    }
}
