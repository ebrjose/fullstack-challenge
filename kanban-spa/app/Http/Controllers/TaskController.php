<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Http\Requests\Task\UpdateIndexesRequest;
use App\Services\TaskService;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    public $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        $resourceOptions = $this->parseResourceOptions();
        $sendData = $this->taskService->getAll($resourceOptions);

        return $this->response($sendData, Response::HTTP_OK);
    }


    public function store(StoreTaskRequest $request)
    {
        $data = $request->validated();
        $sendData['task'] = $this->taskService->create($data);

        return $this->response($sendData, Response::HTTP_CREATED);
    }


    public function show($task)
    {
        $resourceOptions = $this->parseResourceOptions();
        $sendData['task'] = $this->taskService->getById($task, $resourceOptions);

        return $this->response($sendData);
    }


    public function update(UpdateTaskRequest $request, $task)
    {
        $data = $request->validated();
        $sendData['task'] = $this->taskService->update($task, $data);

        return $this->response($sendData, Response::HTTP_ACCEPTED);
    }


    public function destroy($task)
    {
        $this->taskService->delete($task);
        return $this->response(null, Response::HTTP_NO_CONTENT);
    }

    public function updateIndexes(UpdateIndexesRequest $request)
    {
        $data = $request->validated();
        $response = $this->taskService->updateIndexes($data['indexes']);
        return $this->response($response, Response::HTTP_ACCEPTED);
    }
}
