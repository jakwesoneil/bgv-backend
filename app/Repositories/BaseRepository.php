<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\_Interfaces\BaseRepositoryInterface;

class BaseRepository implements BaseRepositoryInterface
{

    public function __construct(
        private readonly Model $model,
        private readonly array $relationships,
        private readonly array $relationshipsInList

    )
    {}

    public function getList($orderBy = 'id', $sortBy = 'desc'): Collection
    {
        return $this->model->query()
            ->with(
                $this->relationshipsInList
            )->withCount(
                $this->relationships
            )->orderBy(
                $orderBy, $sortBy
            )->get();
    }

    public function create($data)
    {
        return $this->model->query()->create($data);
    }

    public function updateById($id, $data)
    {
        return tap($this->model->query()->find($id))->update($data);
    }

    public function getById($id)
    {
        return $this->model->query()->with($this->relationships)->withCount($this->relationships)->find($id);
    }

    public function deleteById($id): ?bool
    {
        return $this->model->query()->findOrFail($id)->delete();
    }
}
