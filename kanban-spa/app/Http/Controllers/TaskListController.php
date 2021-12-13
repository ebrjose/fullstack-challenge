<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskList\StoreTaskListRequest;
use App\Http\Requests\TaskList\UpdateTaskListRequest;
use App\Services\TaskListService;
use Symfony\Component\HttpFoundation\Response;

class TaskListController extends Controller
{
    public $taskListService;

    public function __construct(TaskListService $taskListService)
    {
        $this->taskListService = $taskListService;
    }

    public function index()
    {
        $resourceOptions = $this->parseResourceOptions();
        $sendData = $this->taskListService->getAll($resourceOptions);
        return $this->response($sendData, Response::HTTP_OK);
    }

    public function store(StoreTaskListRequest $request)
    {
        $data = $request->validated();
        $sendData['taskList'] = $this->taskListService->create($data);

        return $this->response($sendData, Response::HTTP_CREATED);
    }

    public function show($task_list_id)
    {
        $resourceOptions = $this->parseResourceOptions();
        $sendData['taskList'] = $this->taskListService->getById($task_list_id, $resourceOptions);

        return $this->response($sendData);
    }

    public function update(UpdateTaskListRequest $request, $task_list_id)
    {
        $data = $request->validated();
        $sendData['taskList'] = $this->taskListService->update($task_list_id, $data);

        return $this->response($sendData, Response::HTTP_ACCEPTED);
    }

    public function destroy($task_list_id)
    {
        $this->taskListService->delete($task_list_id);
        return $this->response(null, Response::HTTP_NO_CONTENT);
    }
}
