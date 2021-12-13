<?php

namespace App\Repositories;

use App\Abstracts\Repository;
use App\Models\Board;

class BoardRepository extends Repository
{
    protected $sortProperty = 'created_at';
    protected $sortDirection = 'DESC';

    public function getModel()
    {
        return new Board();
    }
}
