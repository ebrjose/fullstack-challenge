<?php

namespace App\Repositories;

use App\Abstracts\Repository;
use App\Models\Task;

class TaskRepository extends Repository
{
    protected $sortProperty = 'index';
    protected $sortDirection = 'ASC';

    public function getModel()
    {
        return new Task();
    }
}
