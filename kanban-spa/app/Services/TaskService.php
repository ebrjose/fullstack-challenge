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

    public function updateIndexes(array $sortedIndexes)
    {
        $updated = [];

        foreach ($sortedIndexes as $item) {
            $taskId = $item['id'];
            $data = [
                'index' => $item['index'],
                'task_list_id' => $item['task_list_id']
            ];
            $updated[] = $this->update($taskId, $data);
        }

        return $updated;
    }
}
