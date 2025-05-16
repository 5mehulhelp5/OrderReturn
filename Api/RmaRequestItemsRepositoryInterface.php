<?php

namespace Skuld\OrderReturn\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Skuld\OrderReturn\Api\Data\RmaRequestItemsInterface;
use Skuld\OrderReturn\Api\Data\RmaRequestItemsSearchResultsInterface;

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

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return Skuld\OrderReturn\Api\Data\RmaRequestItemsSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria, ?bool $includeDeleted = false): RmaRequestItemsSearchResultsInterface;

    /**
     * @param \Skuld\OrderReturn\Api\Data\RmaRequestItemsInterface | \Magento\Framework\Model\AbstractModel $requestItem
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function softDelete(RmaRequestItemsInterface $requestItem): bool;

    /**
     * @param int $requestItemId
     * @return bool
     * @throws NoSuchEntityException
     * @throws CouldNotDeleteException
     */
    public function softDeleteById(int $requestItemId): bool;

    /**
     * @param \Skuld\OrderReturn\Api\Data\RmaRequestItemsInterface $requestItem
     * @return bool
     * @throws CouldNotSaveException
     */
    public function restore(RmaRequestItemsInterface $requestItem): bool;

    /**
     * @param int $requestItemId
     * @return bool
     * @throws NoSuchEntityException
     * @throws CouldNotSaveException
     */
    public function restoreById(int $requestItemId): bool;

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Skuld\OrderReturn\Api\Data\RmaRequestItemsSearchResultsInterface
     */
    public function getListWithDeleted(SearchCriteriaInterface $searchCriteria): RmaRequestItemsSearchResultsInterface;
}
