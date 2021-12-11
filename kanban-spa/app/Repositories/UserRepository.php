<?php

namespace App\Repositories;

use App\Abstracts\Repository;
use App\Models\User;

class UserRepository extends Repository
{
    protected $sortProperty = 'id';
    protected $sortDirection = 'ASC';

    public function getModel()
    {
        return new User();
    }

    public function create(array $data)
    {
        $model = $this->getModel();

        $data['password'] = bcrypt($data['password']);

        $model->fill($data);
        $model->save();

        return $model;
    }
}
