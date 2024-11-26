<?php

namespace App\Repositories\_Interfaces;

interface BaseRepositoryInterface
{
    public function getList($orderBy, $sortBy);

    public function create($data);

    public function updateById($id, $data);

    public function getById($id);

    public function deleteById($id);
}
