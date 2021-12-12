<?php

namespace App\Services;

use App\Abstracts\Repository;
use App\Abstracts\Service;
use App\Repositories\TaskRepository;

class TaskService extends Service
{
    protected Repository $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }
}
