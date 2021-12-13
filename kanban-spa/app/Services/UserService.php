<?php

namespace App\Services;

use App\Abstracts\Repository;
use App\Abstracts\Service;
use App\Repositories\UserRepository;

class UserService extends Service
{
    protected Repository $repository;
    protected $setupUserService;

    public function __construct(UserRepository $userRepository, SetupUserBoardService $setupUserService)
    {
        $this->repository = $userRepository;
        $this->setupUserService = $setupUserService;
    }

    public function create($data)
    {
        $user = $this->repository->create($data);

        $this->setupUserService->setup($user);

        return $user;
    }
}
