<?php

namespace App\Http\Controllers;

use App\Http\Requests\Board\StoreBoardRequest;
use App\Http\Requests\Board\UpdateBoardRequest;
use App\Services\BoardService;
use Symfony\Component\HttpFoundation\Response;

class BoardController extends Controller
{
    public $boardService;

    public function __construct(BoardService $boardService)
    {
        $this->boardService = $boardService;
    }

    public function index()
    {
        $resourceOptions = $this->parseResourceOptions();
        $sendData = $this->boardService->getAll($resourceOptions);
        return $this->response($sendData, Response::HTTP_OK);
    }

    public function store(StoreBoardRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $request->getUser();
        $sendData['board'] = $this->boardService->create($data);

        return $this->response($sendData, Response::HTTP_CREATED);
    }

    public function show($boardId)
    {
        $resourceOptions = $this->parseResourceOptions();
        $sendData = $this->boardService->getById($boardId, $resourceOptions);

        return $this->response($sendData, Response::HTTP_OK);
    }

    public function update(UpdateBoardRequest $request, $boardId)
    {
        $data = $request->validated();
        $sendData['board'] = $this->boardService->update($boardId, $data);

        return $this->response($sendData, Response::HTTP_ACCEPTED);
    }

    public function destroy($boardId)
    {
        $this->boardService->delete($boardId);
        return $this->response(null, Response::HTTP_NO_CONTENT);
    }
}
