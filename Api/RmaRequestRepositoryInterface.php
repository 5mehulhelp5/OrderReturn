<?php

namespace Skuld\OrderReturn\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Skuld\OrderReturn\Api\Data\RmaRequestInterface;
use Skuld\OrderReturn\Api\Data\RmaRequestSearchResultsInterface;

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
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(RmaRequestInterface $request): bool;

    /**
     * @param int $requestId
     * @return bool
     * @throws NoSuchEntityException
     * @throws CouldNotDeleteException
     */
    public function deleteById(int $requestId): bool;

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @param bool | null $includeDeleted
     * @return RmaRequestSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria, ?bool $includeDeleted = false): RmaRequestSearchResultsInterface;

    /**
     * @param \Skuld\OrderReturn\Api\Data\RmaRequestInterface | \Magento\Framework\Model\AbstractModel $request
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function softDelete(RmaRequestInterface $request): bool;

    /**
     * @param int $requestId
     * @return bool
     * @throws NoSuchEntityException
     * @throws CouldNotDeleteException
     */
    public function softDeleteById(int $requestId): bool;

    /**
     * @param int $requestId
     * @return bool
     * @throws CouldNotSaveException
     */
    public function restore(RmaRequestInterface $request): bool;

    /**
     * @param int $requestId
     * @return bool
     * @throws NoSuchEntityException
     * @throws CouldNotSaveException
     */
    public function restoreById(int $requestId): bool;

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return RmaRequestSearchResultsInterface
     */
    public function getListWithDeleted(SearchCriteriaInterface $searchCriteria): RmaRequestSearchResultsInterface;

}
