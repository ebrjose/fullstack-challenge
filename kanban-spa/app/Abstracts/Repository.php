<?php

namespace App\Abstracts;

use one2tek\larapi\Database\Repository as BaseRepository;

abstract class Repository extends BaseRepository
{
    protected $sortProperty = 'id';
    protected $sortDirection = 'DESC';

    public function create(array $data)
    {
        $model = $this->getModel();

        $model->fill($data);
        $model->save();

        return $model;
    }

    public function update($model, array $data)
    {
        $model->fill($data);
        $model->save();

        return $model;
    }
}
