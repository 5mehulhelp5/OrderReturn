<?php

namespace Skuld\OrderReturn\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Skuld\OrderReturn\Api\Data\RmaReasonForReturnCodesInterface;
use Skuld\OrderReturn\Api\Data\RmaReasonForReturnCodesSearchResultsInterface;

interface RmaReasonForReturnCodesRepositoryInterface
{
    /**
     * @param \Skuld\OrderReturn\Api\Data\RmaReasonForReturnCodesInterface | Magento\Framework\Model\AbstractModel $reasonForReturnCode
     * @return \Skuld\OrderReturn\Api\Data\RmaReasonForReturnCodesInterface
     * @throws CouldNotSaveException
     */
    public function save(RmaReasonForReturnCodesInterface $reasonForReturnCode): RmaReasonForReturnCodesInterface;

    /**
     * @param int $reasonForReturnCodeId
     * @return \Skuld\OrderReturn\Api\Data\RmaReasonForReturnCodesInterface
     * @throws NoSuchEntityException
     */
    public function getById(int $reasonForReturnCodeId): RmaReasonForReturnCodesInterface;

    /**
     * @param \Skuld\OrderReturn\Api\Data\RmaReasonForReturnCodesInterface|Magento\Framework\Model\AbstractModel $reasonForReturnCode
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(RmaReasonForReturnCodesInterface $reasonForReturnCode): bool;

    /**
     * @param int $reasonForReturnCodeId
     * @return bool
     * @throws NoSuchEntityException
     * @throws CouldNotDeleteException
     */
    public function deleteById(int $reasonForReturnCodeId): bool;

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Skuld\OrderReturn\Api\Data\RmaReasonForReturnCodesSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): RmaReasonForReturnCodesSearchResultsInterface;
}
