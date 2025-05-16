<?php

namespace Skuld\OrderReturn\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Skuld\OrderReturn\Api\Data\RmaReturnRequestTypeCodesInterface;
use Skuld\OrderReturn\Api\Data\RmaReturnRequestTypeCodesSearchResultsInterface;

interface RmaReturnRequestTypeCodesRepositoryInterface
{
    /**
     * @param \Skuld\OrderReturn\Api\Data\RmaReturnRequestTypeCodesInterface | \Magento\Framework\Model\AbstractModel $rmaReturnRequestTypeCode
     * @return \Skuld\OrderReturn\Api\Data\RmaReturnRequestTypeCodesInterface
     * @throws CouldNotSaveException
     */
    public function save(RmaReturnRequestTypeCodesInterface $rmaReturnRequestTypeCode): RmaReturnRequestTypeCodesInterface;

    /**
     * @param int $returnRequestTypeCodeId
     * @return RmaReturnRequestTypeCodesInterface
     * @throws NoSuchEntityException
     */
    public function getById(int $returnRequestTypeCodeId): RmaReturnRequestTypeCodesInterface;

    /**
     * @param \Skuld\OrderReturn\Api\Data\RmaReturnRequestTypeCodesInterface | \Magento\Framework\Model\AbstractModel $rmaReturnRequestTypeCode
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(RmaReturnRequestTypeCodesInterface $rmaReturnRequestTypeCode): bool;

    /**
     * @param int $returnRequestTypeCodeId
     * @return bool
     * @throws NoSuchEntityException
     * @throws CouldNotDeleteException
     */
    public function deleteById(int $returnRequestTypeCodeId): bool;

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Skuld\OrderReturn\Api\Data\RmaReturnRequestTypeCodesSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria, ?bool $includeDeleted = false): RmaReturnRequestTypeCodesSearchResultsInterface;

    /**
     * @param \Skuld\OrderReturn\Api\Data\RmaReturnRequestTypeCodesInterface | \Magento\Framework\Model\AbstractModel $rmaReturnRequestTypeCode
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function softDelete(RmaReturnRequestTypeCodesInterface $rmaReturnRequestTypeCode): bool;

    /**
     * @param int $returnRequestTypeCodeId
     * @return bool
     * @throws NoSuchEntityException
     * @throws CouldNotDeleteException
     */
    public function softDeleteById(int $returnRequestTypeCodeId): bool;

    /**
     * @param \Skuld\OrderReturn\Api\Data\RmaReturnRequestTypeCodesInterface $rmaReturnRequestTypeCode
     * @return bool
     * @throws CouldNotSaveException
     */
    public function restore(RmaReturnRequestTypeCodesInterface $rmaReturnRequestTypeCode): bool;

    /**
     * @param int $returnRequestTypeCodeId
     * @return bool
     * @throws NoSuchEntityException
     * @throws CouldNotSaveException
     */
    public function restoreById(int $returnRequestTypeCodeId): bool;

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Skuld\OrderReturn\Api\Data\RmaReturnRequestTypeCodesSearchResultsInterface
     */
    public function getListWithDeleted(SearchCriteriaInterface $searchCriteria): RmaReturnRequestTypeCodesSearchResultsInterface;
}
