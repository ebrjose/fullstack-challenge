<?php

namespace App\Repositories;

use App\Abstracts\Repository;
use App\Models\Board;

class BoardRepository extends Repository
{
    protected $sortProperty = 'id';
    protected $sortDirection = 'ASC';

    public function getModel()
    {
        return new Board();
    }
}
