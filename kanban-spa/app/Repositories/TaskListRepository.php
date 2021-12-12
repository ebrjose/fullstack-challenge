<?php

namespace App\Repositories;

use App\Abstracts\Repository;
use App\Models\TaskList;

class TaskListRepository extends Repository
{
    protected $sortProperty = 'index';
    protected $sortDirection = 'ASC';

    public function getModel()
    {
        return new TaskList();
    }
}
