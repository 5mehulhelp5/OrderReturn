<?php

namespace Skuld\OrderReturn\Api;

use Skuld\OrderReturn\Api\Data\RmaReasonForReturnCodesInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

interface RmaReasonForReturnCodesRepositoryInterface
{
    /**
     * @param RmaReasonForReturnCodesInterface $reasonForReturnCode
     * @return RmaReasonForReturnCodesInterface
     * @throws CouldNotSaveException
     */
    public function save(RmaReasonForReturnCodesInterface $reasonForReturnCode): RmaReasonForReturnCodesInterface;

    /**
     * @param int $reasonForReturnCodeId
     * @return RmaReasonForReturnCodesInterface
     * @throws NoSuchEntityException
     */
    public function getById(int $reasonForReturnCodeId): RmaReasonForReturnCodesInterface;

    /**
     * @param RmaReasonForReturnCodesInterface $reasonForReturnCode
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
}
