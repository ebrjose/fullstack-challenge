<?php

namespace App\Http\Controllers;

use App\Http\Requests\Board\StoreBoardRequest;
use App\Http\Requests\Board\UpdateBoardRequest;
use App\Models\Board;
use App\Services\BoardService;

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

        return $this->response($sendData);
    }

    public function store(StoreBoardRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = 1; //$request->getUser();
        $sendData['board'] = $this->boardService->create($data);

        return $this->response($sendData, 201);
    }

    public function show($board)
    {
        $resourceOptions = $this->parseResourceOptions();
        $sendData = $this->boardService->getById($board, $resourceOptions);

        return $this->response($sendData);
    }

    public function update(UpdateBoardRequest $request, $board)
    {
        $data = $request->validated();
        $sendData['consultorio'] = $this->boardService->update($board, $data);

        return $this->response($sendData);
    }

    public function destroy($board)
    {
        $this->boardService->delete($board);

        return $this->response(null, 204);
    }
}
