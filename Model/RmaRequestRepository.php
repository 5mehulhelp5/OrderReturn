<?php

namespace Skuld\OrderReturn\Model;

use Skuld\OrderReturn\Api\Data\RmaRequestInterface;
use Skuld\OrderReturn\Api\RmaRequestRepositoryInterface;

class RmaRequestRepository implements RmaRequestRepositoryInterface
{

    public function save(RmaRequestInterface $request): RmaRequestInterface
    {
        // TODO: Implement save() method.
    }

    public function getById(int $requestId): RmaRequestInterface
    {
        // TODO: Implement getById() method.
    }

    public function delete(RmaRequestInterface $request): RmaRequestInterface
    {
        // TODO: Implement delete() method.
    }

    public function deleteById(int $requestId): RmaRequestInterface
    {
        // TODO: Implement deleteById() method.
    }

    public function softDelete(RmaRequestInterface $request): RmaRequestInterface
    {
        // TODO: Implement softDelete() method.
    }

    public function softDeleteById(int $requestId): RmaRequestInterface
    {
        // TODO: Implement softDeleteById() method.
    }
}
