<?php

namespace App\Services;

use App\Abstracts\Repository;
use App\Abstracts\Service;
use App\Repositories\UserRepository;

class UserService extends Service
{
    protected Repository $repository;

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }
}
