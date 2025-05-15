<?php

namespace Skuld\OrderReturn\Api;

use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Skuld\OrderReturn\Api\Data\RmaRequestInterface;

interface RmaRequestRepositoryInterface
{
    /**
     * @param \Skuld\OrderReturn\Api\Data\RmaRequestInterface | \Magento\Framework\Model\AbstractModel $rmaRequest
     * @return \Skuld\OrderReturn\Api\Data\RmaRequestInterface
     * @throws CouldNotSaveException
     */
    public function save(RmaRequestInterface $request): RmaRequestInterface;

    /**
     * @param int $requestId
     * @return \Skuld\OrderReturn\Api\Data\RmaRequestInterface
     * @throws NoSuchEntityException
     */
    public function getById(int $requestId): RmaRequestInterface;

    /**
     * @param \Skuld\OrderReturn\Api\Data\RmaRequestInterface | \Magento\Framework\Model\AbstractModel $request
     * @return \Skuld\OrderReturn\Api\Data\RmaRequestInterface
     * @throws CouldNotDeleteException
     */
    public function delete(RmaRequestInterface $request): RmaRequestInterface;

    /**
     * @param int $requestId
     * @return \Skuld\OrderReturn\Api\Data\RmaRequestInterface
     * @throws NoSuchEntityException
     * @throws CouldNotDeleteException
     */
    public function deleteById(int $requestId): RmaRequestInterface;

    /**
     * @param \Skuld\OrderReturn\Api\Data\RmaRequestInterface | \Magento\Framework\Model\AbstractModel $request
     * @return \Skuld\OrderReturn\Api\Data\RmaRequestInterface
     * @throws CouldNotDeleteException
     */
    public function softDelete(RmaRequestInterface $request): RmaRequestInterface;

    /**
     * @param int $requestId
     * @return \Skuld\OrderReturn\Api\Data\RmaRequestInterface
     * @throws NoSuchEntityException
     * @throws CouldNotDeleteException
     */
    public function softDeleteById(int $requestId): RmaRequestInterface;
}
