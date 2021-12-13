<?php

namespace App\Abstracts;

use App\Exceptions\ResourceNotFoundException;

abstract class Service
{
    protected Repository $repository;

    public function getAll($options = [])
    {
        return $this->repository->getWithCount($options);
    }

    public function getById($resourceId, array $options = [])
    {
        return $this->getRequestedResource($resourceId, $options);
    }

    public function create($data)
    {
        return $this->repository->create($data);
    }

    public function update(int $resourceId, array $data)
    {
        $resource = $this->getRequestedResource($resourceId);

        $this->repository->update($resource, $data);

        return $resource;
    }

    public function delete($resourceId)
    {
        $this->repository->delete($resourceId);
    }

    protected function getRequestedResource($resourceId, array $options = [])
    {
        $resource = $this->repository->getById($resourceId, $options);

        if (is_null($resource)) {
            throw new ResourceNotFoundException;
        }

        return $resource;
    }
}
