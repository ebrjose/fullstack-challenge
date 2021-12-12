<?php

namespace App\Services;

use App\Abstracts\Repository;
use App\Abstracts\Service;
use App\Repositories\TaskListRepository;

class TaskListService extends Service
{
    protected Repository $repository;

    public function __construct(TaskListRepository $repository)
    {
        $this->repository = $repository;
    }
}
