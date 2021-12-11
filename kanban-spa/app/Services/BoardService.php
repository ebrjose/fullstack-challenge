<?php

namespace App\Services;

use App\Abstracts\Repository;
use App\Abstracts\Service;
use App\Repositories\BoardRepository;

class BoardService extends Service
{
    protected Repository $repository;

    public function __construct(BoardRepository $boardRepository)
    {
        $this->repository = $boardRepository;
    }
}
