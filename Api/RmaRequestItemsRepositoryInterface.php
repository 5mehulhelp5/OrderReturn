<?php

namespace Skuld\OrderReturn\Api;

use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Skuld\OrderReturn\Api\Data\RmaRequestItemsInterface;

interface RmaRequestItemsRepositoryInterface
{
    /**
     * @param \Skuld\OrderReturn\Api\Data\RmaRequestItemsInterface | Magento\Framework\Model\AbstractModel $requestItem
     * @return \Skuld\OrderReturn\Api\Data\RmaRequestItemsInterface
     * @throws CouldNotSaveException
     */
    public function save(RmaRequestItemsInterface $requestItem): RmaRequestItemsInterface;

    /**
     * @param int $requestItemId
     * @return \Skuld\OrderReturn\Api\Data\RmaRequestItemsInterface
     * @throws NoSuchEntityException
     */
    public function getById(int $requestItemId): RmaRequestItemsInterface;

    /**
     * @param \Skuld\OrderReturn\Api\Data\RmaRequestItemsInterface | Magento\Framework\Model\AbstractModel $rmaRequestItem
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(RmaRequestItemsInterface $requestItem): bool;

    /**
     * @param int $rmaRequestItemId
     * @return bool
     * @throws NoSuchEntityException
     * @throws CouldNotDeleteException
     */
    public function deleteById(int $requestItemId): bool;
}
